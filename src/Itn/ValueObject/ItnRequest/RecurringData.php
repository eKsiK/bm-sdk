<?php

namespace BlueMedia\Itn\ValueObject\ItnRequest;

use BlueMedia\Serializer\SerializableInterface;
use DateTime;
use JMS\Serializer\Annotation\AccessorOrder;
use JMS\Serializer\Annotation\Type;

/**
 * @AccessorOrder("custom",
 *     custom = {
 *      "recurringAction",
 *      "clientHash",
 *      "expirationDate"
 * })
 */
class RecurringData implements SerializableInterface
{
    /**
     * @var string|null
     * @Type("string")
     */
    protected $recurringAction;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $clientHash;

    /**
     * @var DateTime|null
     * @Type("DateTime<'YmdHis'>")
     */
    protected $expirationDate;

    public function getRecurringAction(): ?string
    {
        return $this->recurringAction;
    }

    public function getClientHash(): ?string
    {
        return $this->clientHash;
    }

    public function getExpirationDate(): ?DateTime
    {
        return $this->expirationDate;
    }
}
