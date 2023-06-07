<?php

namespace Vormkracht10\WeFact\Resources;

use Vormkracht10\WeFact\Exceptions\InvalidRequestException;
use Vormkracht10\WeFact\Exceptions\MethodNotAvailableException;

class Debtor extends Resource
{
    final public const CONTROLLER_NAME = 'debtor';

    public function getResourceName(): string
    {
        return self::CONTROLLER_NAME;
    }

    public function delete(array $params = []): array|MethodNotAvailableException|InvalidRequestException
    {
        throw new MethodNotAvailableException(
            sprintf('%s is not available for this resource.', __METHOD__)
        );
    }
}
