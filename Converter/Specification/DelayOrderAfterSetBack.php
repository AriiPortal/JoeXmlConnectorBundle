<?php

namespace Arii\JoeXmlConnectorBundle\Converter\Specification;

use BFolliot\Date\DateInterval;

class DelayOrderAfterSetBack implements SpecificationInterface
{

    public static function getXmlName()
    {
        return 'delay_order_after_setback';
    }

    public static function getEntityName()
    {
        return 'Arii\JOEBundle\Entity\DelayOrderAfterSetBack';
    }

    public static function getAttributes()
    {
        return array(
            array(
                'entityProperty' => 'delay',
                'xmlName'        => 'delay',
            ),
            array(
                'entityProperty' => 'setbackCount',
                'xmlName'        => 'setback_count',
            ),
            array(
                'entityProperty' => 'isMaximum',
                'xmlName'        => 'is_maximum',
                'filterToXml' => function ($value) {
                    return $value ? 'yes' : 'no';
                },
                'filterToEntity' => function ($value) {
                    return $value == 'yes';
                },
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