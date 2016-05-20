<?php

namespace Arii\JoeXmlConnectorBundle\Converter\Specification;

class At implements SpecificationInterface
{

    public static function getXmlName()
    {
        return 'at';
    }

    public static function getEntityName()
    {
        return 'Arii\JOEBundle\Entity\At';
    }

    public static function getAttributes()
    {
        return array(
            array(
                'entityProperty' => 'at',
                'xmlName'        => 'at',
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