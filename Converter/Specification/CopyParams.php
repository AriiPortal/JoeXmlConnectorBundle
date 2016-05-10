<?php

namespace Arii\JoeXmlConnectorBundle\Converter\Specification;

class CopyParams implements SpecificationInterface
{

    public static function getXmlName()
    {
        return 'copy_params';
    }

    public static function getEntityName()
    {
        return 'Arii\JOEBundle\Entity\CopyParams';
    }

    public static function getAttributes()
    {
        return array(
            array(
                'entityProperty' => 'fromSource',
                'xmlName'        => 'from',
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