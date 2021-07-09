<?php

declare(strict_types=1);

namespace BlueMedia\Transaction\ValueObject;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\AccessorOrder;

/**
 * @AccessorOrder("custom",
 *     custom = {
 *      "status",
 *      "redirecturl",
 *      "orderID",
 *      "remoteID",
 *      "hash"
 * })
 */
final class TransactionContinue extends Transaction
{
    /**
     * @var string
     * @Type("string")
     */
    private $status;

    /**
     * @var string
     * @Type("string")
     */
    private $redirecturl;

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getRedirectUrl(): string
    {
        return $this->redirecturl;
    }
}
