<?php

declare(strict_types=1);

namespace BlueMedia\HttpClient;

use BlueMedia\Common\Dto\AbstractDto;
use Psr\Http\Message\ResponseInterface;

class HttpClient implements HttpClientInterface
{
    /**
     * @var Builder
     */
    private $httpClientBuilder;

    public function __construct(Builder $httpClientBuilder = null)
    {
        $this->httpClientBuilder = $httpClientBuilder ?? new Builder();
    }

    /**
     * Perform POST request.
     */
    public function post(AbstractDto $requestDto): ResponseInterface
    {
        return $this->httpClientBuilder->getHttpClient()->post(
            $requestDto->getRequest()->getRequestUrl(),
            $requestDto->getRequest()->getRequestHeaders(),
            http_build_query($requestDto->getRequestData()->capitalizedArray())
        );
    }
}
