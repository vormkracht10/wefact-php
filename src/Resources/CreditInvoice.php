<?php

namespace Vormkracht10\WeFact\Resources;

use GuzzleHttp\Client;

class CreditInvoice extends Resource
{
    final public const CONTROLLER_NAME = 'creditinvoice';

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

    public function getPluralResourceName(): string
    {
        return self::CONTROLLER_NAME . 's';
    }
}
