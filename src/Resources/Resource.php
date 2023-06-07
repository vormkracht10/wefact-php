<?php

namespace Vormkracht10\WeFact\Resources;

use GuzzleHttp\Client;
use Vormkracht10\WeFact\Enums\Action;
use Vormkracht10\WeFact\Exceptions\InvalidRequestException;
use Vormkracht10\WeFact\Exceptions\MethodNotAvailableException;
use Vormkracht10\WeFact\Traits\Request;

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
     * @return array<string, mixed>|InvalidRequestException
     * @throws InvalidRequestException
     */
    public function list(array $params = []): array|InvalidRequestException
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
     * @return array<string, mixed>|InvalidRequestException
     * @throws InvalidRequestException
     */
    public function show(int $id, array $params = []): array|InvalidRequestException
    {
        $params['Identifier'] = $id;

        $controller = $this->getResourceName();

        return $this->sendRequest(
            controller: $controller,
            action: Action::SHOW->value,
            params: $params
        );
    }

    /**
     * @param  array<string, mixed>  $params
     * @return array<string, mixed>|InvalidRequestException
     * @throws InvalidRequestException
     */
    public function create(array $params): array|InvalidRequestException
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
     * @return array<string, mixed>|InvalidRequestException
     * @throws InvalidRequestException
     */
    public function edit(array $params): array|InvalidRequestException
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
     * @return array<string, mixed>|MethodNotAvailableException|InvalidRequestException
     *
     * @throws MethodNotAvailableException|InvalidRequestException
     */
    public function delete(array $params = []): array|MethodNotAvailableException|InvalidRequestException
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
