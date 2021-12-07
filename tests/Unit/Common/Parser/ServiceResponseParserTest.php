<?php

declare(strict_types=1);

namespace BlueMedia\Tests\Unit\Common\Parser;

use BlueMedia\Common\Exception\XmlException;
use BlueMedia\Tests\Unit\BaseTestCase;
use BlueMedia\Common\Parser\ServiceResponseParser;

class ServiceResponseParserTest extends BaseTestCase
{
    /**
     * @dataProvider wrongXmlProvider
     */
    public function testParseListResponseThrowsExceptionOnWrongXml(string $response): void
    {
        $parser = new ServiceResponseParser(
            new \Nyholm\Psr7\Response(200, [], $response),
            $this->getConfigurationStub()
        );

        $this->expectException(XmlException::class);

        $parser->parseListResponse('test_class_name');
    }

    public function wrongXmlProvider(): array
    {
        return [
            ['ERROR'],
            ['<error>something</error>'],
        ];
    }
}
