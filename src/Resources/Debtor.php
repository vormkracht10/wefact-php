<?php

namespace Vormkracht10\WeFact\Resources;

use Vormkracht10\WeFact\Exceptions\MethodNotAvailableException;

class Debtor extends Resource
{
    final public const CONTROLLER_NAME = 'debtor';

    public function getResourceName(): string
    {
        return self::CONTROLLER_NAME;
    }

    public function getPluralResourceName(): string
    {
        return self::CONTROLLER_NAME.'s';
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
