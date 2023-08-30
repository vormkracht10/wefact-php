<?php

namespace Vormkracht10\WeFact\Resources;

use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use JsonException;
use Vormkracht10\WeFact\Enums\Subscription\SubscriptionAction;
use Vormkracht10\WeFact\Exceptions\MethodNotAvailableException;

class Subscription extends Resource
{
    final public const CONTROLLER_NAME = 'subscription';

    public function getResourceName(): string
    {
        return self::CONTROLLER_NAME;
    }

    public function getPluralResourceName(): string
    {
        return self::CONTROLLER_NAME . 's';
    }

    /**
     * @return array<string, mixed>
     *
     * @throws MethodNotAvailableException
     */
    public function delete(array $params = []): array
    {
        throw new MethodNotAvailableException(
            sprintf('%s is not available for this resource.', __METHOD__)
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
    public function terminate(array $params = []): array
    {
        return $this->sendRequest(
            controller: $this->getResourceName(),
            action: SubscriptionAction::TERMINATE->value,
            params: $params
        );
    }
}
