<?php

namespace Vormkracht10\WeFact\Resources\Settings;

use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use JsonException;
use Vormkracht10\WeFact\Enums\Action;
use Vormkracht10\WeFact\Exceptions\MethodNotAvailableException;
use Vormkracht10\WeFact\Resources\Resource;
use Vormkracht10\WeFact\Traits\Request;

class CostCategory extends Resource
{
    use Request;

    final public const CONTROLLER_NAME = 'costcategory';

    public function getResourceName(): string
    {
        return self::CONTROLLER_NAME;
    }

    public function getPluralResourceName(): string
    {
        return 'costcategories';
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
