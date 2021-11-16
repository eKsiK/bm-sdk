<?php

declare(strict_types=1);

namespace BlueMedia;

use BlueMedia\Common\ValueObject\HashableInterface;
use BlueMedia\HttpClient\ValueObject\Response;
use BlueMedia\Itn\ValueObject\Itn;

interface ClientInterface
{
    public function getTransactionRedirect(array $transactionData): Response;

    public function doTransactionBackground(array $transactionData): Response;

    public function doTransactionInit(array $transactionData): Response;

    public function doItnIn(string $itn): Response;

    public function doItnInResponse(Itn $itn, bool $transactionConfirmed = true): Response;

    public function getPaywayList(string $gatewayUrl): Response;

    public function getRegulationList(string $gatewayUrl): Response;

    public function checkHash(HashableInterface $data): bool;

    public function doConfirmationCheck(array $data): bool;

    public static function getItnObject(string $itn): Itn;
}
