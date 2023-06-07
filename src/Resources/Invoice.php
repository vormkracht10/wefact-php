<?php

namespace Vormkracht10\WeFact\Resources;

use GuzzleHttp\Client;
use Vormkracht10\WeFact\Enums\Invoice\InvoiceAction;
use Vormkracht10\WeFact\Exceptions\InvalidRequestException;

class Invoice extends Resource
{
    final public const CONTROLLER_NAME = 'invoice';

    public function __construct(
        protected Client $http,
        protected string $apiKey,
        protected string $apiUrl
    ) {
        $this->http = $http;
    }

    public function getResourceName(): string
    {
        return self::CONTROLLER_NAME;
    }

    public function markAsPaid(array $params = []): array|InvalidRequestException
    {
        $controller = $this->getResourceName();

        return $this->sendRequest(
            controller: $controller,
            action: InvoiceAction::MARK_AS_PAID->value,
            params: $params
        );
    }

    public function markAsUnpaid(array $params = []): array|InvalidRequestException
    {
        $controller = $this->getResourceName();

        return $this->sendRequest(
            controller: $controller,
            action: InvoiceAction::MARK_AS_UNPAID->value,
            params: $params
        );
    }
}
