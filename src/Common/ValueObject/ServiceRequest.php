<?php

declare(strict_types=1);

namespace BlueMedia\Common\ValueObject;

use JMS\Serializer\Annotation\AccessorOrder;
use JMS\Serializer\Annotation\Type;

/**
 * @AccessorOrder("custom",
 *     custom = {
 *      "serviceID",
 *      "messageID",
 *      "hash"
 * })
 */
class ServiceRequest extends AbstractValueObject
{
    /**
     * @var string
     * @Type("string")
     */
    protected $serviceID;

    /**
     * @var string
     * @Type("string")
     */
    protected $messageID;

    /**
     * @var string
     * @Type("string")
     */
    protected $hash;

    public function setServiceID(string $serviceID): self
    {
        $this->serviceID = $serviceID;

        return $this;
    }

    public function getServiceID(): string
    {
        return $this->serviceID;
    }

    public function getMessageID(): string
    {
        return $this->messageID;
    }

    public function setHash(string $hash): self
    {
        $this->hash = $hash;

        return $this;
    }

    public function getHash(): string
    {
        return $this->hash;
    }
}
