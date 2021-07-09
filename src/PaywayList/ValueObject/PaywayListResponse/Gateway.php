<?php

declare(strict_types=1);

namespace BlueMedia\PaywayList\ValueObject\PaywayListResponse;

use JMS\Serializer\Annotation\Type;

final class Gateway
{
    /**
     * @var int
     * @Type("int")
     */
    private $gatewayID;

    /**
     * @var string
     * @Type("string")
     */
    private $gatewayName;

    /**
     * @var string
     * @Type("string")
     */
    private $gatewayType;

    /**
     * @var string
     * @Type("string")
     */
    private $bankName;

    /**
     * @var string
     * @Type("string")
     */
    private $iconURL;

    /**
     * @var string
     * @Type("string")
     */
    private $statusDate;

    public function getGatewayID(): int
    {
        return $this->gatewayID;
    }

    public function getGatewayName(): string
    {
        return $this->gatewayName;
    }

    public function getGatewayType(): string
    {
        return $this->gatewayType;
    }

    public function getBankName(): string
    {
        return $this->bankName;
    }

    public function getIconURL(): string
    {
        return $this->iconURL;
    }

    public function getStatusDate(): string
    {
        return $this->statusDate;
    }
}
