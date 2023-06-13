<?php

namespace Vormkracht10\WeFact\Resources\Settings;

use Vormkracht10\WeFact\Enums\Action;
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

    /**
     * @return array<mixed, string>
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
     * @return array<mixed, string>
     */
    public function show(array $params = []): array
    {
        throw new MethodNotAvailableException(
            sprintf('%s is not available for this resource.', __METHOD__)
        );
    }

    /**
     * @return array<mixed, string>
     */
    public function create(array $params): array
    {
        throw new MethodNotAvailableException(
            sprintf('%s is not available for this resource.', __METHOD__)
        );
    }

    /**
     * @return array<mixed, string>
     */
    public function edit(array $params): array
    {
        throw new MethodNotAvailableException(
            sprintf('%s is not available for this resource.', __METHOD__)
        );
    }

    /**
     * @return array<mixed, string>
     */
    public function delete(array $params = []): array
    {
        throw new MethodNotAvailableException(
            sprintf('%s is not available for this resource.', __METHOD__)
        );
    }
}
