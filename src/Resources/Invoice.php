<?php

namespace Vormkracht10\WeFact\Resources;

use GuzzleHttp\Client;

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
}
