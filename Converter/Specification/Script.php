<?php

namespace Arii\JoeXmlConnectorBundle\Converter\Specification;

use DateTime;

class Script implements SpecificationInterface
{

    public static function getXmlName()
    {
        return 'script';
    }

    public static function getEntityName()
    {
        return 'Arii\JOEBundle\Entity\Script';
    }

    public static function getAttributes()
    {

        return array(
            array(
                'entityProperty' => 'comClass',
                'xmlName'        => 'com_class',
            ),
            array(
                'entityProperty' => 'filename',
                'xmlName'        => 'filename',
            ),
            array(
                'entityProperty' => 'javaClass',
                'xmlName'        => 'java_class',
            ),
            array(
                'entityProperty' => 'javaClassPath',
                'xmlName'        => 'java_class_path',
            ),
            array(
                'entityProperty' => 'language',
                'xmlName'        => 'language',
            ),
        );
    }

    public static function getChildren()
    {
        return array(
            array(
                'entityCollectionAddMethode' => 'addInclude',
                'entityProperty'             => 'includes',
                'spec'                       => IncludeFile::class,
                'xmlElement'                 => 'include',
            ),
        );
    }

    public static function getContent()
    {
        return 'code';
    }
}