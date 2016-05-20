<?php

namespace Arii\JoeXmlConnectorBundle\Converter\Specification;


class StartJob implements SpecificationInterface
{

    public static function getXmlName()
    {
        return 'start_job';
    }

    public static function getEntityName()
    {
        return 'Arii\JOEBundle\Entity\StartJob';
    }

    public static function getAttributes()
    {
        return array(
            array(
                'entityProperty' => 'afterDelay',
                'xmlName'        => 'after',
            ),
            array(
                'entityProperty' => 'at',
                'xmlName'        => 'at',
            ),
            array(
                'entityProperty' => 'forceStart',
                'xmlName'        => 'force',
                'filterToXml' => function ($value) {
                    return $value ? 'yes' : 'no';
                },
                'filterToEntity' => function ($value) {
                    return $value == 'yes';
                },
            ),
            array(
                'entityProperty' => 'job',
                'xmlName'        => 'job',
            ),
            array(
                'entityProperty' => 'taskName',
                'xmlName'        => 'name',
            ),
            array(
                'entityProperty' => 'web_service',
                'xmlName'        => 'web_service',
            ),
        );
    }

    public static function getChildren()
    {
        return array(
            array(
                'entityProperty' => 'params',
                'spec'           => Params::class,
                'xmlElement'     => 'params',
            ),
            array(
                'entityCollectionAddMethode' => 'addVariable',
                'entityProperty'             => 'environmentVariables',
                'spec'                       => Variable::class,
                'xmlElement'                 => 'variable',
                'xmlGroup'                   => 'environment',
            ),
        );
    }

    public static function getContent()
    {
        return null;
    }
}