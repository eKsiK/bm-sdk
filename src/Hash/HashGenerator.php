<?php

declare(strict_types=1);

namespace BlueMedia\Hash;

use BlueMedia\Configuration;

final class HashGenerator
{
    /**
     * Generates hash.
     */
    public static function generateHash(array $data, Configuration $configuration): string
    {
        $result = '';

        foreach ($data as $name => $value) {
            if ('hash' === mb_strtolower($name)) {
                unset($data[$name]);
                continue;
            }

            if (is_array($value)) {
                $value = array_filter($value, 'mb_strlen');
                $value = implode($configuration->getHashSeparator(), $value);
            }

            $result .= $value.$configuration->getHashSeparator();
        }

        $result .= $configuration->getSharedKey();

        return hash($configuration->getHashAlgo(), $result);
    }
}
