<?php

declare(strict_types=1);

namespace BlueMedia\Common\Builder;

use BlueMedia\Configuration;
use BlueMedia\Hash\HashGenerator;
use BlueMedia\Serializer\Serializer;
use BlueMedia\Common\Dto\AbstractDto;

final class ServiceDtoBuilder
{
    /**
     * @template T of AbstractDto
     * @psalm-param class-string<T> $type
     * @return T
     */
    public static function build(array $data, string $type, Configuration $configuration): AbstractDto
    {
        $serializer = new Serializer();

        $dto = $serializer->serializeDataToDto($data, $type);
        /** @psalm-suppress UndefinedMethod */
        $dto->getRequestData()->setServiceId($configuration->getServiceId());

        $hash = HashGenerator::generateHash(
            $dto->getRequestData()->toArray(),
            $configuration
        );

        /** @psalm-suppress UndefinedMethod */
        $dto->getRequestData()->setHash($hash);

        return $dto;
    }
}
