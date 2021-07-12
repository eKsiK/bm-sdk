<?php

declare(strict_types=1);

namespace BlueMedia\Itn\Builder;

use BlueMedia\Itn\Dto\ItnDto;
use BlueMedia\Serializer\Serializer;
use BlueMedia\Common\Util\XMLParser;

final class ItnDtoBuilder
{
    public static function build(string $itnData): ItnDto
    {
        $serializer = new Serializer();
        $xmlData = XMLParser::parse($itnData);

        $xmlTransaction = $xmlData->transactions->transaction->asXML();
        /** @var ItnDto $itnDto */
        $itnDto = $serializer->deserializeXml($xmlTransaction, ItnDto::class);

        $itnDto->getItn()->setServiceID((string) $xmlData->serviceID);
        $itnDto->getItn()->setHash((string) $xmlData->hash);

        return $itnDto;
    }
}
