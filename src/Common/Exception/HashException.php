<?php

declare(strict_types=1);

namespace BlueMedia\Common\Exception;

final class HashException extends \RuntimeException
{
    public static function wrongHashError(): self
    {
        return new self('Received wrong hash!');
    }
}
