<?php

declare(strict_types=1);

namespace BlueMedia;

use BlueMedia\Common\Enum\ClientEnum;
use InvalidArgumentException;

class Configuration
{
    /**
     * @var string
     */
    private $serviceId;

    /**
     * @var string
     */
    private $sharedKey;

    /**
     * @var string
     */
    private $hashAlgo;

    /**
     * @var string
     */
    private $hashSeparator;

    public function __construct(
        string $serviceId,
        string $sharedKey,
        string $hashAlgo,
        string $hashSeparator
    ) {
        if (!in_array($hashAlgo, ClientEnum::HASH_TYPES)) {
            throw new InvalidArgumentException(sprintf('Not supported hash algorithm "%s"', $hashAlgo));
        }

        if (mb_strlen($serviceId) > 10) {
            throw new InvalidArgumentException(sprintf('Service ID is too long, should be max %s chars.', 10));
        }

        $this->serviceId = $serviceId;
        $this->sharedKey = $sharedKey;
        $this->hashAlgo = $hashAlgo;
        $this->hashSeparator = $hashSeparator;
    }

    public function getServiceId(): string
    {
        return $this->serviceId;
    }

    public function getSharedKey(): string
    {
        return $this->sharedKey;
    }

    public function getHashAlgo(): string
    {
        return $this->hashAlgo;
    }

    public function getHashSeparator(): string
    {
        return $this->hashSeparator;
    }
}
