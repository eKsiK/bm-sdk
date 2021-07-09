<?php

declare(strict_types=1);

namespace BlueMedia\Itn\ValueObject;

use BlueMedia\Common\ValueObject\AbstractValueObject;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\AccessorOrder;
use BlueMedia\Serializer\SerializableInterface;

/**
 * @AccessorOrder("custom",
 *     custom = {
 *      "serviceID",
 *      "orderID",
 *      "remoteID",
 *      "amount",
 *      "currency",
 *      "gatewayID",
 *      "paymentDate",
 *      "paymentStatus",
 *      "paymentStatusDetails",
 *      "hash"
 * })
 */
final class Itn extends AbstractValueObject implements SerializableInterface
{
    /**
     * Transaction service id.
     *
     * @var string
     * @Type("string")
     */
    protected $serviceID;

    /**
     * Transaction order id.
     *
     * @var string
     * @Type("string")
     */
    protected $orderID;

    /**
     * Remote order id.
     *
     * @var string
     * @Type("string")
     */
    protected $remoteID;

    /**
     * Transaction amount.
     *
     * @var string
     * @Type("string")
     */
    protected $amount;

    /**
     * Transaction currency.
     *
     * @var string
     * @Type("string")
     */
    protected $currency;

    /**
     * Transaction gateway id.
     *
     * @var int
     * @Type("int")
     */
    protected $gatewayID;

    /**
     * Payment date. YYYYMMDDhhmmss.
     *
     * @var string
     * @Type("string")
     */
    protected $paymentDate;

    /**
     * Payment status.
     *
     * @var string
     * @Type("string")
     */
    protected $paymentStatus;

    /**
     * Payment status details.
     *
     * @var string
     * @Type("string")
     */
    protected $paymentStatusDetails;

    /**
     * Itn hash.
     *
     * @var string
     * @Type("string")
     */
    protected $hash;

    public function setServiceID(string $serviceID): Itn
    {
        $this->serviceID = $serviceID;

        return $this;
    }

    public function setHash(string $hash): Itn
    {
        $this->hash = $hash;

        return $this;
    }

    public function getHash(): string
    {
        return trim($this->hash);
    }

    public function getOrderID(): string
    {
        return $this->orderID;
    }

    public function getRemoteID(): string
    {
        return $this->remoteID;
    }

    public function getAmount(): string
    {
        return $this->amount;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function getPaymentDate(): string
    {
        return $this->paymentDate;
    }

    public function getPaymentStatus(): string
    {
        return $this->paymentStatus;
    }

    public function getPaymentStatusDetails(): string
    {
        return $this->paymentStatusDetails;
    }
}
