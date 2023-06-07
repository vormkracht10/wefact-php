<?php

namespace Vormkracht10\WeFact\Resources\Settings;

use Vormkracht10\WeFact\Enums\Action;
use Vormkracht10\WeFact\Exceptions\InvalidRequestException;
use Vormkracht10\WeFact\Exceptions\MethodNotAvailableException;
use Vormkracht10\WeFact\Resources\Resource;
use Vormkracht10\WeFact\Traits\Request;

class Settings extends Resource
{
    use Request;

    final public const CONTROLLER_NAME = 'settings';

    public function getResourceName(): string
    {
        return self::CONTROLLER_NAME;
    }

    public function list(array $params = []): array|MethodNotAvailableException|InvalidRequestException
    {
        $controller = $this->getResourceName();

        return $this->sendRequest(
            controller: $controller,
            action: Action::LIST->value,
            params: $params
        );
    }

    public function show(array $params = []): array|MethodNotAvailableException|InvalidRequestException
    {
        throw new MethodNotAvailableException(
            sprintf('%s is not available for this resource.', __METHOD__)
        );
    }

    public function create(array $params): array|MethodNotAvailableException|InvalidRequestException
    {
        throw new MethodNotAvailableException(
            sprintf('%s is not available for this resource.', __METHOD__)
        );
    }

    public function edit(array $params): array|MethodNotAvailableException|InvalidRequestException
    {
        throw new MethodNotAvailableException(
            sprintf('%s is not available for this resource.', __METHOD__)
        );
    }

    public function delete(array $params = []): array|MethodNotAvailableException|InvalidRequestException
    {
        throw new MethodNotAvailableException(
            sprintf('%s is not available for this resource.', __METHOD__)
        );
    }
}
