<?php

namespace Arii\JoeXmlConnectorBundle\Converter\Specification;

class Description implements SpecificationInterface
{

    public static function getXmlName()
    {
        return 'description';
    }

    public static function getEntityName()
    {
        return 'Arii\JOEBundle\Entity\Description';
    }

    public static function getAttributes()
    {
        return array();
    }

    public static function getChildren()
    {
        return array(
            array(
                'entityProperty'             => 'includeFile',
                'spec'                       => IncludeFile::class,
                'xmlElement'                 => 'include',
            ),
        );
    }

    public static function getContent()
    {
        return 'content';
    }
}