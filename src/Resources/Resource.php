<?php

namespace Vormkracht10\WeFact\Resources;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use JsonException;
use Vormkracht10\WeFact\Enums\Action;
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
     * @return array<string, mixed>|MethodNotAvailableException|ClientException|ServerException|BadResponseException|JsonException
     *
     * @throws ClientException|ServerException|BadResponseException|JsonException
     */
    public function listAll(int $offset = 0, int $perPage = 1000)
    {
        // Rate limit the requests to prevent IP blocking.
        $limitPerSecond = 300 / 60; // Per minute / seconds
        $calls = 1;

        $data = [];

        $pluralResourceName = $this->getPluralResourceName();

        $result = $this->sendRequest(
            controller: $this->getResourceName(),
            action: Action::LIST->value,
            params: [
                'limit' => $perPage,
                'offset' => $offset,
            ]
        );

        foreach ($result[$pluralResourceName] as $index => $item) {
            $calls++;

            if ($calls % $limitPerSecond == 0) {
                sleep(1);
            }

            $resultItem = $this->show([
                'Identifier' => $item['Identifier'],
            ]);

            $result[$pluralResourceName][$index] = $resultItem[$pluralResourceName];
        }

        $data = array_merge($data, $result[$pluralResourceName] ?? []);

        if ($result['currentresults'] >= $perPage) {
            $offset += $perPage;
            $data = array_merge($data, $this->listAll($offset, $perPage));
        }

        return $data;
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

    abstract public function getPluralResourceName(): string;
}
