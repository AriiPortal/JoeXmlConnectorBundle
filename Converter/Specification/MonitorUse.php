<?php

namespace Arii\JoeXmlConnectorBundle\Converter\Specification;

class MonitorUse implements SpecificationInterface
{

    public static function getXmlName()
    {
        return 'monitor.use';
    }

    public static function getEntityName()
    {
        return 'Arii\JOEBundle\Entity\MonitorUse';
    }

    public static function getAttributes()
    {
        return array(
            array(
                'entityProperty' => 'monitor',
                'xmlName'        => 'monitor',
            ),
            array(
                'entityProperty' => 'ordering',
                'xmlName'        => 'ordering',
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