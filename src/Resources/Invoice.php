<?php

namespace Vormkracht10\WeFact\Resources;

use GuzzleHttp\Client;
use Vormkracht10\WeFact\Enums\Action;
use Vormkracht10\WeFact\Traits\Request;

class Invoice
{
    use Request;

    public const CONTROLLER_NAME = 'invoice';

    public function __construct(
        protected Client $http,
        protected string $apiKey,
        protected string $apiUrl
    ) {
        $this->http = $http;
    }

    public function getEndpointName(): string
    {
        return self::CONTROLLER_NAME;
    }

    public function list(array $params = []): array
    {
        return $this->sendRequest(
            controller: self::CONTROLLER_NAME,
            action: Action::LIST->value,
            params: $params
        );
    }

    public function show(int $id, array $params = []): array
    {
        $params['Identifier'] = $id;

        return $this->sendRequest(
            controller: self::CONTROLLER_NAME,
            action: Action::SHOW->value,
            params: $params
        );
    }

    public function showByInvoiceCode(string $invoiceCode, array $params = []): array
    {
        $params['InvoiceCode'] = $invoiceCode;

        return $this->sendRequest(
            controller: self::CONTROLLER_NAME,
            action: Action::SHOW->value,
            params: $params
        );
    }

    public function delete(int $id, array $params = []): array
    {
        $params['Identifier'] = $id;

        return $this->sendRequest(
            controller: self::CONTROLLER_NAME,
            action: Action::DELETE->value,
            params: $params
        );
    }

    public function deleteByInvoiceCode(string $invoiceCode, array $params = []): array
    {
        $params['InvoiceCode'] = $invoiceCode;

        return $this->sendRequest(
            controller: self::CONTROLLER_NAME,
            action: Action::DELETE->value,
            params: $params
        );
    }

    // public function add(array $params = []): array
    // {
    //     return $this->sendRequest(
    //         controller: self::CONTROLLER_NAME,
    //         action: Action::ADD->value,
    //         params: $params
    //     );
    // }
}
