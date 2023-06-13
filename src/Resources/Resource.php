<?php

namespace Vormkracht10\WeFact\Resources;

use GuzzleHttp\Client;
use \JsonException;
use Vormkracht10\WeFact\Enums\Action;
use Vormkracht10\WeFact\Exceptions\MethodNotAvailableException;
use Vormkracht10\WeFact\Traits\Request;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Exception\BadResponseException;

abstract class Resource
{
    use Request;

    public function __construct(
        protected Client $http,
        protected string $apiKey,
        protected string $apiUrl
    ) {
        $this->http = $http;
    }

    /**
     * @param  array<string, mixed>  $params
     * @return array<string, mixed>
     *
     * @throws ClientException|ServerException|BadResponseException|JsonException
     */
    public function list(array $params = []): array
    {
        $controller = $this->getResourceName();

        return $this->sendRequest(
            controller: $controller,
            action: Action::LIST->value,
            params: $params
        );
    }

    /**
     * @param  array<string, mixed>  $params
     * @return array<string, mixed>|MethodNotAvailableException|ClientException|ServerException|BadResponseException|JsonException
     *
     * @throws MethodNotAvailableException|ClientException|ServerException|BadResponseException|JsonException
     */
    public function show(array $params = []): array|MethodNotAvailableException|ClientException|ServerException|BadResponseException|JsonException
    {
        $controller = $this->getResourceName();

        return $this->sendRequest(
            controller: $controller,
            action: Action::SHOW->value,
            params: $params
        );
    }

    /**
     * @param  array<string, mixed>  $params
     * @return array<string, mixed>|MethodNotAvailableException|ClientException|ServerException|BadResponseException|JsonException
     *
     * @throws MethodNotAvailableException|ClientException|ServerException|BadResponseException|JsonException
     */
    public function create(array $params): array|MethodNotAvailableException|ClientException|ServerException|BadResponseException|JsonException
    {
        $controller = $this->getResourceName();

        return $this->sendRequest(
            controller: $controller,
            action: Action::ADD->value,
            params: $params
        );
    }

    /**
     * @param  array<string, mixed>  $params
     * @return array<string, mixed>|MethodNotAvailableException|ClientException|ServerException|BadResponseException|JsonException
     *
     * @throws MethodNotAvailableException|ClientException|ServerException|BadResponseException|JsonException
     */
    public function edit(array $params): array|MethodNotAvailableException|ClientException|ServerException|BadResponseException|JsonException
    {
        $controller = $this->getResourceName();

        return $this->sendRequest(
            controller: $controller,
            action: Action::EDIT->value,
            params: $params
        );
    }

    /**
     * @param  array<string, mixed>  $params
     * @return array<string, mixed>|MethodNotAvailableException|ClientException|ServerException|BadResponseException|JsonException
     *
     * @throws MethodNotAvailableException|ClientException|ServerException|BadResponseException|JsonException
     */
    public function delete(array $params = []): array|MethodNotAvailableException|ClientException|ServerException|BadResponseException|JsonException
    {
        $controller = $this->getResourceName();

        return $this->sendRequest(
            controller: $controller,
            action: Action::DELETE->value,
            params: $params
        );
    }

    abstract public function getResourceName(): string;
}
