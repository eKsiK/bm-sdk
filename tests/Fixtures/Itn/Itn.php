<?php

declare(strict_types=1);

namespace BlueMedia\Tests\Fixtures\Itn;

use SimpleXMLElement;

abstract class Itn
{
    public static function getItnInRequest(): string
    {
        return base64_encode(file_get_contents(__DIR__.'/ItnInRequest.xml'));
    }

    public static function getTransactionXml(): SimpleXMLElement
    {
        $xml = new SimpleXMLElement(file_get_contents(__DIR__.'/ItnInRequest.xml'));

        return $xml->transactions->transaction;
    }

    public static function getItnInWrongHashRequest(): string
    {
        return base64_encode(file_get_contents(__DIR__.'/ItnInWrongHashRequest.xml'));
    }

    public static function getItnResponse(): string
    {
        return file_get_contents(__DIR__.'/ItnResponse.xml');
    }

    public static function getItnRequestWithCustomerData(): string
    {
        return base64_encode(file_get_contents(__DIR__.'/ItnRequestWithCustomerData.xml'));
    }

    public static function getItnResponseWithCustomerData(): string
    {
        return file_get_contents(__DIR__.'/ItnResponseWithCustomerData.xml');
    }

    public static function getTransactionXmlWithCustomerData(): SimpleXMLElement
    {
        $xml = new SimpleXMLElement(file_get_contents(__DIR__.'/ItnRequestWithCustomerData.xml'));

        return $xml->transactions->transaction;
    }
}
