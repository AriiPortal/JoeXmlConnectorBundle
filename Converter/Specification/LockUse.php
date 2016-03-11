<?php

namespace Arii\JoeXmlConnectorBundle\Converter\Specification;

class LockUse implements SpecificationInterface
{

    public static function getXmlName()
    {
        return 'lock.use';
    }

    public static function getEntityName()
    {
        return 'Arii\JOEBundle\Entity\LockUse';
    }

    public static function getAttributes()
    {
        return array(
            array(
                'entityProperty' => 'lock',
                'xmlName'        => 'lock',
            ),
            array(
                'entityProperty' => 'exclusive',
                'xmlName'        => 'exclusive',
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
}
