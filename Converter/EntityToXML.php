<?php

namespace Arii\JoeXmlConnectorBundle\Converter;

use DOMDocument;
use Doctrine\Common\Collections\Collection;

class EntityToXML
{
    protected $entity;
    protected $spec;
    protected $document;

    public function __construct($entity, $spec)
    {
        if (!class_exists($spec)) {
            throw new Exception("Specification class does not exist.", 1);
        }

        $entityClassName = $spec::getEntityName();
        if (!is_object($entity) || !$entity instanceof $entityClassName) {
            throw new Exception('The entity is not an instance of ' . $spec::getEntityName(), 1);
        }

        $this->entity = $entity;
        $this->spec   = $spec;

        $this->document                     = new DOMDocument('1.0', mb_internal_encoding());
        $this->document->preserveWhiteSpace = false;
        $this->document->formatOutput       = true;
    }

    public function toXML()
    {
        $this->document->appendChild(
            $this->createElement(
                $this->entity,
                $this->spec
            )
        );
        return $this->document->saveXML();
    }

    protected function createElement($entity, $spec)
    {

        $element = $this->document->createElement($spec::getXmlName());

        foreach ($spec::getAttributes() as $attributeSpec) {
            $methode = 'get' . ucfirst($attributeSpec['entityProperty']);
            if (method_exists($entity, $methode)) {
                $value = $entity->$methode();
            } else {
                $value = false;
            }

            if (!empty($value) || $value === false || $value === 0) {
                if (!empty($attributeSpec['filterToXml']) && is_callable($attributeSpec['filterToXml'])) {
                    $value = $attributeSpec['filterToXml']($value);
                }

                if (isset($attributeSpec['default']) && $value == $attributeSpec['default']) {
                    continue;
                }

                if (!empty($attributeSpec['xmlChildElement'])) {
                    $xmlChildElement = $this->document->createElement($childSpec['xmlChildElement']);
                    $xmlChildElement->setAttribute(
                        $attributeSpec['xmlName'],
                        $value
                    );
                    $element->appendChild($xmlChildElement);
                } else {
                    $element->setAttribute(
                        $attributeSpec['xmlName'],
                        $value
                    );
                }
            }
        }

        foreach ($spec::getChildren() as $childSpec) {
            $methode = 'get' . ucfirst($childSpec['entityProperty']);
            if (method_exists($entity, $methode)) {
                $value = $entity->$methode();
            } else {
                $value = false;
            }

            if (empty($value)) {
                continue;
            }
            if (!empty($childSpec['xmlGroup'])) {
                $parent = $this->document->createElement($childSpec['xmlGroup']);
            } else {
                $parent = $element;
            }

            $isEmpty = true;

            if (is_array($value) || $value instanceof Collection) {
                foreach ($value as $childValue) {
                    $isEmpty = false;

                    $parent->appendChild(
                        $this->createElement($childValue, $childSpec['spec'])
                    );
                }
            } else {
                $isEmpty = false;
                $parent->appendChild(
                    $this->createElement($value, $childSpec['spec'])
                );
            }

            if (!empty($childSpec['xmlGroup']) && !$isEmpty) {
                $element->appendChild($parent);
            }
        }

        $contentProperty = $spec::getContent();
        if ($contentProperty != null)
        {
            $method = 'get' .  ucfirst($contentProperty);

            if (method_exists($entity, $method))
            {
                $content = $entity->$method();
                if (!empty($content))
                {
                    $cdata = $this->document->createCDATASection($content);
                    $element->appendChild($cdata);
                }
            }
        }

        return $element;
    }
}
