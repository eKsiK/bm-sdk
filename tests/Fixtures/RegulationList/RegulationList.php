<?php

declare(strict_types=1);

namespace BlueMedia\Tests\Fixtures\RegulationList;

abstract class RegulationList
{
    public static function getRegulationListResponse(): string
    {
        return file_get_contents(__DIR__.'/RegulationList.xml');
    }
}
