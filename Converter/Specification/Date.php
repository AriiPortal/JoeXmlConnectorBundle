<?php

namespace Arii\JoeXmlConnectorBundle\Converter\Specification;

class Date implements SpecificationInterface
{

    public static function getXmlName()
    {
        return 'date';
    }

    public static function getEntityName()
    {
        return 'Arii\JOEBundle\Entity\Date';
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
        return array(
            array(
                'entityCollectionAddMethode' => 'addPeriod',
                'entityProperty'             => 'periods',
                'spec'                       => Period::class,
                'xmlElement'                 => 'period',
            ),
        );
    }

    public static function getContent()
    {
        return null;
    }
}