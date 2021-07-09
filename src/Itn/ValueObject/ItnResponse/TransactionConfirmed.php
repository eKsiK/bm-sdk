<?php

declare(strict_types=1);

namespace BlueMedia\Itn\ValueObject\ItnResponse;

use BlueMedia\Serializer\SerializableInterface;
use JMS\Serializer\Annotation\AccessorOrder;
use JMS\Serializer\Annotation\Type;

/**
 * @AccessorOrder("custom",
 *     custom = {
 *      "orderID",
 *      "confirmation"
 * })
 */
final class TransactionConfirmed implements SerializableInterface
{
    /**
     * @var string
     * @Type("string")
     */
    private $orderID;

    /**
     * @var string
     * @Type("string")
     */
    private $confirmation;

    public function getOrderID(): string
    {
        return $this->orderID;
    }

    public function getConfirmation(): string
    {
        return $this->confirmation;
    }
}
