<?php

declare(strict_types=1);

namespace BlueMedia\Hash;

use BlueMedia\Common\ValueObject\HashableInterface;
use BlueMedia\Configuration;

final class HashChecker
{
    public static function checkHash(HashableInterface $data, Configuration $configuration): bool
    {
        $dataHash = HashGenerator::generateHash(
            $data->toArray(),
            $configuration
        );

        return $dataHash === $data->getHash();
    }
}
