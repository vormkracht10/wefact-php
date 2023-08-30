<?php

namespace Vormkracht10\WeFact\Resources;

use Exception;
use JsonException;
use GuzzleHttp\Client;
use Vormkracht10\WeFact\Enums\Action;
use Vormkracht10\WeFact\Traits\Request;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Exception\BadResponseException;
use Vormkracht10\WeFact\Exceptions\MethodNotAvailableException;

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
    * @return array<string, mixed>
    *
    * @throws ClientException|ServerException|BadResponseException|JsonException
    */
    public function listAll(int $offset = 0, int $perPage = 1000): array
    {
        // Rate limit the requests to prevent IP blocking.
        $limitPerSecond = 300 / 60; // Per minute / seconds
        $calls = 1;

        $data = [];

        $pluralResourceName = $this->getPluralResourceName();

        try {
            $result = $this->list(params: [
                    'limit' => $perPage,
                    'offset' => $offset,
                ]
            );
        } catch (Exception $e) {
            throw $e;
        }

        foreach ($result[$pluralResourceName] as $index => $item) {
            $calls++;

            if ($calls % $limitPerSecond == 0) {
                sleep(1);
            }

            try {
                $resultItem = $this->show([
                    'Identifier' => $item['Identifier'],
                ]);
            } catch (Exception $e) {
                throw $e;
            }

            if (is_array($resultItem) && isset($resultItem[$this->getResourceName()])) {
                $result[$pluralResourceName][$index] = $resultItem[$this->getResourceName()];
            } else {
                // Handle the case where $resultItem is not an array or does not contain the expected resource name.
                continue;
            }
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
