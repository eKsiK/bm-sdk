<?php

declare(strict_types=1);

namespace BlueMedia\Hash;

use BlueMedia\Configuration;
use BlueMedia\Serializer\SerializableInterface;

final class HashChecker
{
    public static function checkHash(SerializableInterface $data, Configuration $configuration): bool
    {
        $dataHash = HashGenerator::generateHash(
            $data->toArray(),
            $configuration
        );

        return $dataHash === $data->getHash();
    }
}
