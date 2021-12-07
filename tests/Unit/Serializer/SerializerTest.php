<?php

declare(strict_types=1);

namespace BlueMedia\Tests\Unit\Serializer;

use BlueMedia\Serializer\Serializer;
use BlueMedia\Transaction\Dto\TransactionDto;
use BlueMedia\Tests\Unit\BaseTestCase;

class SerializerTest extends BaseTestCase
{
    private $transactionData = [
        'gatewayUrl' => 'https://accept-pay.bm.pl',
        'transaction' => [
            'orderId' => '123-123',
            'amount' => '1.20',
            'description' => 'Transakcja 123-123',
            'gatewayId' => '0',
        ],
    ];

    private $serializer;

    protected function setUp(): void
    {
        $this->serializer = new Serializer();
    }

    public function testSerializeTransactionDataReturnsTransactionDto(): void
    {
        $transactionDto = $this->serializer->serializeDataToDto($this->transactionData, TransactionDto::class);

        $this->assertSame($this->transactionData['gatewayUrl'], $transactionDto->getGatewayUrl());
    }
}
