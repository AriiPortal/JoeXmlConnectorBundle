<?php

namespace Arii\JoeXmlConnectorBundle\Converter\Specification;

use BFolliot\Date\DateInterval;
use DateTime;

use Arii\JoeXmlConnectorBundle\Converter\Exception\NoResultException;

abstract class AbstractTime implements SpecificationInterface
{

    public static function getAttributes()
    {
        return array(
            array(
                'entityProperty' => 'begin',
                'xmlName'        => 'begin',
            ),
            array(
                'entityProperty' => 'end',
                'xmlName'        => 'end',
            ),
            array(
                'entityProperty' => 'letRun',
                'xmlName'        => 'let_run',
                'filterToXml' => function ($value) {
                    return $value ? 'yes' : 'no';
                },
                'filterToEntity' => function ($value) {
                    return $value == 'yes';
                },
                'default' => 'no',
            ),
            array(
                'entityProperty' => 'singleStart',
                'xmlName'        => 'single_start',
            ),
            array(
                'entityProperty' => 'whenHoliday',
                'xmlName'        => 'when_holiday',
            ),
            array(
                'entityProperty' => 'repeat',
                'xmlName'        => 'repeat',
            )
        );
    }

    public static function getContent()
    {
        return null;
    }
}