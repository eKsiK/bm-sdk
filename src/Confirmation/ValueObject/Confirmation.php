<?php

declare(strict_types=1);

namespace BlueMedia\Confirmation\ValueObject;

use BlueMedia\Common\ValueObject\HashableInterface;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\AccessorOrder;
use BlueMedia\Serializer\SerializableInterface;
use BlueMedia\Common\ValueObject\AbstractValueObject;

/**
 * @AccessorOrder("custom",
 *     custom = {
 *      "serviceID",
 *      "orderID",
 *      "hash"
 * })
 */
class Confirmation extends AbstractValueObject implements SerializableInterface, HashableInterface
{
    /**
     * @var string
     * @Type("string")
     */
    private $ServiceID;

    /**
     * @var string
     * @Type("string")
     */
    private $OrderID;

    /**
     * Transaction hash.
     *
     * @var string
     * @Type("string")
     */
    private $Hash;

    public function getServiceID(): string
    {
        return $this->ServiceID;
    }

    public function getOrderID(): string
    {
        return $this->OrderID;
    }

    public function getHash(): string
    {
        return $this->Hash;
    }
}
