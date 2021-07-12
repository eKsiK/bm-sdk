<?php

declare(strict_types=1);

namespace BlueMedia\Serializer;

use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;

final class Serializer implements SerializerInterface
{
    private const XML_TYPE = 'xml';

    /**
     * @var \JMS\Serializer\Serializer
     */
    private $serializer;

    public function __construct()
    {
        $this->serializer = SerializerBuilder::create()
            ->setPropertyNamingStrategy(
                new SerializedNameAnnotationStrategy(
                    new IdenticalPropertyNamingStrategy()
                )
            )
            ->build();
    }

    /**
     * @template T
     * @psalm-param class-string<T> $type
     *
     * @return T
     */
    public function serializeDataToDto(array $data, string $type)
    {
        return $this->serializer->fromArray($data, $type);
    }

    public function toArray(object $object): array
    {
        return $this->serializer->toArray($object);
    }

    /**
     * @template T
     * @psalm-param class-string<T> $type
     *
     * @return T
     */
    public function fromArray(array $data, string $type)
    {
        return $this->serializer->fromArray($data, $type);
    }

    /**
     * @template T
     * @psalm-param class-string<T> $type
     *
     * @return T
     */
    public function deserializeXml(string $xml, string $type)
    {
        return $this->serializer->deserialize($xml, $type, self::XML_TYPE);
    }

    public function toXml($data): string
    {
        return $this->serializer->serialize($data, self::XML_TYPE);
    }
}
