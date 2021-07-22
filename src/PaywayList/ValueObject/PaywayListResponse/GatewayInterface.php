<?php

declare(strict_types=1);

namespace BlueMedia\PaywayList\ValueObject\PaywayListResponse;

interface GatewayInterface
{
    public function getGatewayID(): int;

    public function getGatewayName(): string;

    public function getGatewayType(): string;

    public function getBankName(): string;

    public function getIconURL(): string;

    public function getStatusDate(): string;
}
