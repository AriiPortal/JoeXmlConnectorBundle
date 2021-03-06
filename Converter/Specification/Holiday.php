<?php

namespace Arii\JoeXmlConnectorBundle\Converter\Specification;

class Holiday implements SpecificationInterface
{

    public static function getXmlName()
    {
        return 'holiday';
    }

    public static function getEntityName()
    {
        return 'Arii\JOEBundle\Entity\Holiday';
    }

    public static function getAttributes()
    {
        return array(
            array(
                'entityProperty' => 'date',
                'xmlName'        => 'date',
            ),
        );
    }

    public static function getChildren()
    {
        return array();
    }

    public static function getContent()
    {
        return null;
    }
}