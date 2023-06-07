<?php

namespace Vormkracht10\WeFact\Resources\Settings;

use Vormkracht10\WeFact\Enums\Action;
use Vormkracht10\WeFact\Traits\Request;
use Vormkracht10\WeFact\Resources\Resource;
use Vormkracht10\WeFact\Exceptions\InvalidRequestException;
use Vormkracht10\WeFact\Exceptions\MethodNotAvailableException;

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
     * @return array<string, mixed>|InvalidRequestException
     *
     * @throws InvalidRequestException
     */
    public function list(array $params = []): array|InvalidRequestException
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
     * @return array<string, mixed>|InvalidRequestException
     *
     * @throws InvalidRequestException
     */
    public function show(array $params = []): array|InvalidRequestException
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
     * @return array<string, mixed>|InvalidRequestException
     *
     * @throws InvalidRequestException
     */
    public function create(array $params): array|InvalidRequestException
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
     * @return array<string, mixed>|InvalidRequestException
     *
     * @throws InvalidRequestException
     */
    public function edit(array $params): array|InvalidRequestException
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
     * @return array<string, mixed>|MethodNotAvailableException|InvalidRequestException
     *
     * @throws MethodNotAvailableException|InvalidRequestException
     */
    public function delete(array $params = []): array|MethodNotAvailableException|InvalidRequestException
    {
        $controller = $this->getResourceName();

        return $this->sendRequest(
            controller: $controller,
            action: Action::COSTCATEGORY_DELETE->value,
            params: $params
        );
    }
}
