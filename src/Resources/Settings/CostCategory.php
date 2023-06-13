<?php

namespace Vormkracht10\WeFact\Resources\Settings;

use Vormkracht10\WeFact\Enums\Action;
use Vormkracht10\WeFact\Exceptions\MethodNotAvailableException;
use Vormkracht10\WeFact\Resources\Resource;
use Vormkracht10\WeFact\Traits\Request;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Exception\BadResponseException;
use \JsonException;

class CostCategory extends Resource
{
    use Request;

    final public const CONTROLLER_NAME = 'settings';

    public function getResourceName(): string
    {
        return self::CONTROLLER_NAME;
    }

    /**
     * @param  array<string, mixed>  $params
     * @return array<string, mixed>
     *
     * @throws ClientException
     * @throws ServerException
     * @throws BadResponseException
     * @throws JsonException
     */
    public function list(array $params = []): array
    {
        $controller = $this->getResourceName();

        return $this->sendRequest(
            controller: $controller,
            action: Action::COSTCATEGORY_LIST->value,
            params: $params
        );
    }

    /**
     * @param  array<string, mixed>  $params
     * @return array<string, mixed>
     *
     * @throws ClientException
     * @throws ServerException
     * @throws BadResponseException
     * @throws JsonException
     */
    public function show(array $params = []): array
    {
        $controller = $this->getResourceName();

        return $this->sendRequest(
            controller: $controller,
            action: Action::COSTCATEGORY_SHOW->value,
            params: $params
        );
    }

    /**
     * @param  array<string, mixed>  $params
     * @return array<string, mixed>
     *
     * @throws ClientException
     * @throws ServerException
     * @throws BadResponseException
     * @throws JsonException
     */
    public function create(array $params): array
    {
        $controller = $this->getResourceName();

        return $this->sendRequest(
            controller: $controller,
            action: Action::COSTCATEGORY_ADD->value,
            params: $params
        );
    }

    /**
     * @param  array<string, mixed>  $params
     * @return array<string, mixed>
     *
     * @throws ClientException
     * @throws ServerException
     * @throws BadResponseException
     * @throws JsonException
     */
    public function edit(array $params): array
    {
        $controller = $this->getResourceName();

        return $this->sendRequest(
            controller: $controller,
            action: Action::COSTCATEGORY_EDIT->value,
            params: $params
        );
    }

    /**
     * @param  array<string, mixed>  $params
     * @return array<string, mixed>
     *
     * @throws MethodNotAvailableException
     * @throws ClientException
     * @throws ServerException
     * @throws BadResponseException
     * @throws JsonException
     */
    public function delete(array $params = []): array
    {
        $controller = $this->getResourceName();

        return $this->sendRequest(
            controller: $controller,
            action: Action::COSTCATEGORY_DELETE->value,
            params: $params
        );
    }
}
