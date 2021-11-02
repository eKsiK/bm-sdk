<?php

declare(strict_types=1);

namespace Tests\Unit;

use BlueMedia\Common\Enum\ClientEnum;
use BlueMedia\HttpClient\Builder;
use BlueMedia\HttpClient\HttpClient;
use BlueMedia\Transaction\ValueObject\Transaction;
use Http\Message\RequestMatcher\RequestMatcher;
use Psr\Http\Message\RequestInterface;
use Tests\Fixtures\Transaction as TransactionFixtures;
use Tests\Fixtures\PaywayList as PaywayListFixtures;
use Tests\Fixtures\RegulationList as RegulationListFixtures;
use Tests\Fixtures\Itn as ItnFixtures;
use BlueMedia\Client;
use BlueMedia\Itn\ValueObject\Itn;
use BlueMedia\HttpClient\ValueObject\Response;
use BlueMedia\Itn\ValueObject\ItnResponse\ItnResponse;
use BlueMedia\RegulationList\ValueObject\RegulationListResponse\RegulationListResponse;
use BlueMedia\Transaction\ValueObject\TransactionInit;
use BlueMedia\Transaction\ValueObject\TransactionContinue;
use BlueMedia\Transaction\ValueObject\TransactionBackground;
use BlueMedia\PaywayList\ValueObject\PaywayListResponse\PaywayListResponse;

final class ClientTest extends BaseTestCase
{
    public function testGetTransactionRedirectReturnsRedirectView(): void
    {
        $result = $this->getHttpClient()
            ->getTransactionRedirect(TransactionFixtures\TransactionInit::getTransactionInitContinue());

        $data = $result->getData();
        $this->assertIsString(Response::class, $data);
        $this->assertStringContainsString(
            '<form action="https://pay-accept.bm.pl/payment" method="post" id="BlueMediaPaymentForm" name="BlueMediaPaymentForm">',
            $data
        );
    }

    /**
     * @dataProvider checkConfirmationProvider
     */
    public function testDoConfirmationCheckReturnsStatus(array $data, bool $result): void
    {
        $check = $this->getHttpClient()->doConfirmationCheck($data);

        $this->assertSame($result, $check);
    }

    public function testDoTransactionBackgroundReturnsTransactionData(): void
    {
        $client = $this->getHttpClient(static function (\Http\Mock\Client $mockClient): \Http\Mock\Client {
            $mockClient->on(new RequestMatcher('/payment', 'pay-accept.bm.pl'), function (RequestInterface $request) {
                return new \Nyholm\Psr7\Response(
                    200,
                    [],
                    TransactionFixtures\TransactionBackground::getTransactionBackgroundResponse()
                );
            });

            return $mockClient;
        });

        $result = $client
            ->doTransactionBackground(TransactionFixtures\TransactionBackground::getTransactionBackground());

        $this->assertInstanceOf(TransactionBackground::class, $result->getData());

        $transactionBackground = $result->getData();
        $transactionBackgroundFixture =
            TransactionFixtures\TransactionBackground::getTransactionBackgroundResponseData();

        $this->assertSame($transactionBackgroundFixture['receiverNRB'], $transactionBackground->getReceiverNRB());
        $this->assertSame($transactionBackgroundFixture['receiverName'], $transactionBackground->getReceiverName());
        $this->assertSame(
            $transactionBackgroundFixture['receiverAddress'],
            $transactionBackground->getReceiverAddress()
        );
        $this->assertSame($transactionBackgroundFixture['orderID'], $transactionBackground->getOrderID());
        $this->assertSame($transactionBackgroundFixture['amount'], $transactionBackground->getAmount());
        $this->assertSame($transactionBackgroundFixture['currency'], $transactionBackground->getCurrency());
        $this->assertSame($transactionBackgroundFixture['title'], $transactionBackground->getTitle());
        $this->assertSame($transactionBackgroundFixture['remoteID'], $transactionBackground->getRemoteID());
        $this->assertSame($transactionBackgroundFixture['bankHref'], $transactionBackground->getBankHref());
        $this->assertSame($transactionBackgroundFixture['returnURL'], $transactionBackground->getReturnURL());
    }

    public function testDoTransactionBackgroundReturnsPaywayForm(): void
    {
        $client = $this->getHttpClient(static function (\Http\Mock\Client $mockClient): \Http\Mock\Client {
            $mockClient->on(new RequestMatcher('/payment', 'pay-accept.bm.pl'), function (RequestInterface $request) {
                return new \Nyholm\Psr7\Response(
                    200,
                    [],
                    TransactionFixtures\TransactionBackground::getPaywayFormResponse()
                );
            });

            return $mockClient;
        });

        $result = $client
            ->doTransactionBackground(TransactionFixtures\TransactionBackground::getTransactionBackground());

        $data = $result->getData();

        $this->assertIsString($data);
        $this->assertStringContainsString(
            '<form action="https://pg-accept.blue.pl/gateway/test/index.jsp" name="formGoPBL" method="POST">',
            $data
        );
    }

    public function testDoTransactionInitReturnsTransactionContinueData(): void
    {
        $client = $this->getHttpClient(static function (\Http\Mock\Client $mockClient): \Http\Mock\Client {
            $mockClient->on(new RequestMatcher('/payment', 'pay-accept.bm.pl'), function (RequestInterface $request) {
                return new \Nyholm\Psr7\Response(
                    200,
                    [],
                    TransactionFixtures\TransactionInit::getTransactionInitContinueResponse()
                );
            });

            return $mockClient;
        });

        $result = $client
            ->doTransactionInit(TransactionFixtures\TransactionInit::getTransactionInitContinue());

        $this->assertInstanceOf(TransactionContinue::class, $result->getData());
    }

    public function testDoTransactionInitReturnsTransactionData(): void
    {
        $client = $this->getHttpClient(static function (\Http\Mock\Client $mockClient): \Http\Mock\Client {
            $mockClient->on(new RequestMatcher('/payment', 'pay-accept.bm.pl'), function (RequestInterface $request) {
                return new \Nyholm\Psr7\Response(
                    200,
                    [],
                    TransactionFixtures\TransactionInit::getTransactionInitResponse()
                );
            });

            return $mockClient;
        });

        $result = $client
            ->doTransactionInit(TransactionFixtures\TransactionInit::getTransactionInit());

        $this->assertInstanceOf(TransactionInit::class, $result->getData());
    }

    public function testDoItnInReturnsItnData(): void
    {
        $result = $this->getHttpClient()->doItnIn(ItnFixtures\Itn::getItnInRequest());

        /** @var Itn $itn */
        $itn = $result->getData();
        $itnFixture = (array) ItnFixtures\Itn::getTransactionXml();

        $this->assertInstanceOf(Itn::class, $result->getData());
        $this->assertSame($itnFixture['remoteID'], $itn->getRemoteId());
        $this->assertSame($itnFixture['amount'], $itn->getAmount());
        $this->assertSame($itnFixture['currency'], $itn->getCurrency());
        $this->assertSame((int) $itnFixture['gatewayID'], $itn->getGatewayID());
        $this->assertSame($itnFixture['paymentDate'], $itn->getPaymentDate());
        $this->assertSame($itnFixture['paymentStatus'], $itn->getPaymentStatus());
        $this->assertSame($itnFixture['paymentStatusDetails'], $itn->getPaymentStatusDetails());
    }

    /**
     * @dataProvider itnProvider
     *
     * @param string $itn
     */
    public function testDoItnInThrowsExceptionOnWrongBase64($itn): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $this->getHttpClient()->doItnIn($itn);
    }

    public function testDoItnResponseReturnsConfirmationResponse(): void
    {
        $itnIn = $this->getHttpClient()->doItnIn(ItnFixtures\Itn::getItnInRequest());
        $result = $this->getHttpClient()->doItnInResponse($itnIn->getData(), true);
        $this->assertInstanceOf(ItnResponse::class, $result->getData());
        $this->assertXmlStringEqualsXmlString(ItnFixtures\Itn::getItnResponse(), $result->getData()->toXml());
    }

    public function testGetPaywayList(): void
    {
        $client = $this->getHttpClient(static function (\Http\Mock\Client $mockClient): \Http\Mock\Client {
            $mockClient->on(new RequestMatcher('/paywayList', 'pay-accept.bm.pl'), function (RequestInterface $request) {
                return new \Nyholm\Psr7\Response(
                    200,
                    [],
                    PaywayListFixtures\PaywayList::getPaywayListResponse()
                );
            });

            return $mockClient;
        });

        $result = $client->getPaywayList(parent::GATEWAY_URL);

        $this->assertInstanceOf(PaywayListResponse::class, $result->getData());
    }

    public function testGetRegulationList(): void
    {
        $client = $this->getHttpClient(static function (\Http\Mock\Client $mockClient): \Http\Mock\Client {
            $mockClient->on(new RequestMatcher('/webapi/regulationsGet', 'pay-accept.bm.pl'), function (RequestInterface $request) {
                return new \Nyholm\Psr7\Response(
                    200,
                    [],
                    RegulationListFixtures\RegulationList::getRegulationListResponse()
                );
            });

            return $mockClient;
        });

        $result = $client->getRegulationList(parent::GATEWAY_URL);

        $this->assertInstanceOf(RegulationListResponse::class, $result->getData());
    }

    /**
     * @dataProvider checkHashProvider
     */
    public function testCheckHashReturnsExpectedValue(string $hash, bool $value): void
    {
        $transactionStub = $this->createStub(Transaction::class);
        $transactionInitData = TransactionFixtures\TransactionInit::getTransactionInit();

        $transactionStub->method('toArray')->willReturn($transactionInitData);
        $transactionStub->method('getHash')->willReturn($hash);

        $result = $this->getHttpClient()->checkHash($transactionStub);

        $this->assertSame($value, $result);
    }

    public function testGetItnObject(): void
    {
        $itn = $this->getHttpClient()::getItnObject(ItnFixtures\Itn::getItnInRequest());
        $itnFixture = (array) ItnFixtures\Itn::getTransactionXml();

        $this->assertSame($itnFixture['remoteID'], $itn->getRemoteId());
        $this->assertSame($itnFixture['amount'], $itn->getAmount());
        $this->assertSame($itnFixture['currency'], $itn->getCurrency());
        $this->assertSame($itnFixture['paymentDate'], $itn->getPaymentDate());
        $this->assertSame($itnFixture['paymentStatus'], $itn->getPaymentStatus());
        $this->assertSame($itnFixture['paymentStatusDetails'], $itn->getPaymentStatusDetails());
    }

    private function getHttpClient(callable $requestMatcher = null): Client
    {
        $mockClient = new \Http\Mock\Client();
        if (null !== $requestMatcher) {
            $mockClient = $requestMatcher($mockClient);
        }

        $httpBuilder = new Builder($mockClient);
        $httpClient = new HttpClient($httpBuilder);

        return new Client(
            parent::SERVICE_ID,
            parent::SHARED_KEY,
            ClientEnum::HASH_SHA256,
            ClientEnum::HASH_SEPARATOR,
            $httpClient
        );
    }

    public function checkHashProvider(): array
    {
        return [
            ['56507c9294e43e649e8726d271174297a165aedb858edb0414aadbc9632f17e7', true],
            ['56507c9294e43e649e8726d271174297a165aedb858edb0414aadbc9632f1111', false],
        ];
    }

    public function itnProvider(): array
    {
        return [
            ['PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiP'],
            ['nope'],
            [''],
        ];
    }

    public function checkConfirmationProvider(): array
    {
        return [
            [
                [
                    'ServiceID' => parent::SERVICE_ID,
                    'OrderID' => '123',
                    'Hash' => 'df5f737f48bcef93361f590b460cc633b28f91710a60415527221f9cb90da52a',
                ],
                true,
            ],
            [
                [
                    'ServiceID' => parent::SERVICE_ID,
                    'OrderID' => '123',
                    'Hash' => 'cd4dd0eed6bfeb1fd0605076caf7b7774624af7cb67cd63b97425c26471d8100',
                ],
                false,
            ],
        ];
    }
}
