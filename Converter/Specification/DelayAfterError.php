<?php

namespace Arii\JoeXmlConnectorBundle\Converter\Specification;

use BFolliot\Date\DateInterval;

class DelayAfterError implements SpecificationInterface
{

    public static function getXmlName()
    {
        return 'delay_after_error';
    }

    public static function getEntityName()
    {
        return 'Arii\JOEBundle\Entity\DelayAfterError';
    }

    public static function getAttributes()
    {
        return array(
            array(
                'entityProperty' => 'delayCount',
                'xmlName'        => 'error_count',
            ),
            array(
                'entityProperty' => 'delay',
                'xmlName'        => 'delay',
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