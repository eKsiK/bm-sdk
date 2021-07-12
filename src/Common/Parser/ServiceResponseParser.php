<?php

declare(strict_types=1);

namespace BlueMedia\Common\Parser;

use BlueMedia\Serializer\SerializableInterface;
use BlueMedia\Serializer\Serializer;

final class ServiceResponseParser extends ResponseParser
{
    /**
     * @template T
     * @psalm-param class-string<T> $type
     *
     * @return T
     */
    public function parseListResponse(string $type): SerializableInterface
    {
        $this->isErrorResponse();

        return (new Serializer())->deserializeXml($this->response, $type);
    }
}
