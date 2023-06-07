<?php

namespace Vormkracht10\WeFact\Resources;

use Vormkracht10\WeFact\Exceptions\MethodNotAvailableException;

class Subscription extends Resource
{
    final public const CONTROLLER_NAME = 'debtor';

    public function getResourceName(): string
    {
        return self::CONTROLLER_NAME;
    }

    /**
     * @param  array<string, mixed>  $params
     * @return MethodNotAvailableException|array<string, mixed>
     *
     * @throws MethodNotAvailableException
     */
    public function delete(array $params = []): MethodNotAvailableException|array
    {
        throw new MethodNotAvailableException(
            sprintf('%s is not available for this resource.', __METHOD__)
        );
    }
}
