<?php

namespace Vormkracht10\WeFact\Resources;

use GuzzleHttp\Client;
use Vormkracht10\WeFact\Enums\Action;

class Invoice extends Resource
{
    public const CONTROLLER_NAME = 'invoice';

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

    /**
     * @param  array<string, mixed>  $params
     * @return array<string, mixed>
     */
    public function showByInvoiceCode(string $invoiceCode, array $params = []): array
    {
        $params['InvoiceCode'] = $invoiceCode;

        return $this->sendRequest(
            controller: $this->getResourceName(),
            action: Action::SHOW->value,
            params: $params
        );
    }

    /**
     * @param  array<string, mixed>  $params
     * @return array<string, mixed>
     */
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
