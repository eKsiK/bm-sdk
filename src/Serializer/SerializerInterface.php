<?php

declare(strict_types=1);

namespace BlueMedia\Serializer;

interface SerializerInterface
{
    /**
     * @template T
     * @psalm-param class-string<T> $type
     * @return T
     */
    public function serializeDataToDto(array $data, string $type);

    public function toArray(object $object): array;

    /**
     * @template T
     * @psalm-param class-string<T> $type
     * @return T
     */
    public function fromArray(array $data, string $type);

    /**
     * @template T
     * @psalm-param class-string<T> $type
     * @return T
     */
    public function deserializeXml(string $xml, string $type);

    public function toXml($data): string;
}
