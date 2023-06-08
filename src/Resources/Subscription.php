<?php

namespace Vormkracht10\WeFact\Resources;

use Vormkracht10\WeFact\Enums\Subscription\SubscriptionAction;
use Vormkracht10\WeFact\Exceptions\InvalidRequestException;
use Vormkracht10\WeFact\Exceptions\MethodNotAvailableException;

class Subscription extends Resource
{
    final public const CONTROLLER_NAME = 'subscription';

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

    /**
     * @param  array<string, mixed>  $params
     * @return array<string, mixed>|InvalidRequestException
     *
     * @throws InvalidRequestException
     */
    public function terminate(array $params = []): array|InvalidRequestException
    {
        return $this->sendRequest(
            controller: $this->getResourceName(),
            action: SubscriptionAction::TERMINATE->value,
            params: $params
        );
    }
}
