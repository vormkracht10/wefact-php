<?php

namespace Vormkracht10\WeFact\Resources;

use GuzzleHttp\Client;

class Creditor extends Resource
{
    final public const CONTROLLER_NAME = 'creditor';

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
