<?php

namespace Vormkracht10\WeFact;

use GuzzleHttp\Client;
use Vormkracht10\WeFact\Resources\Invoice;

class WeFact
{
    protected Client $http;

    protected string $apiUrl = 'https://api.mijnwefact.nl/v2/';

    public function __construct(
        protected string $apiKey
    )
    {
        $this->setHttpClient();
    }

    public function setApiUrl(string $apiUrl): self
    {
        $this->apiUrl = $apiUrl;

        return $this;
    }

    public function getApiUrl(): string
    {
        return $this->apiUrl;
    }

    private function setHttpClient(): Client
    {
        $this->http = new Client();

        return $this->http;
    }

    public function invoice(): Invoice
    {
        return new Invoice(
            $this->http,
            $this->apiKey,
            $this->apiUrl
        );
    }
}
