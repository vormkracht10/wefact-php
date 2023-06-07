<?php

namespace Vormkracht10\WeFact;

use GuzzleHttp\Client;
use Vormkracht10\WeFact\Resources\Debtor;
use Vormkracht10\WeFact\Resources\Invoice;
use Vormkracht10\WeFact\Resources\Group;
use Vormkracht10\WeFact\Resources\Product;

class WeFact
{
    protected Client $http;

    protected string $apiUrl = 'https://api.mijnwefact.nl/v2/';

    public function __construct(
        protected string $apiKey
    ) {
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

    public function debtor(): Debtor
    {
        return new Debtor(
            $this->http,
            $this->apiKey,
            $this->apiUrl
        );
    }

    public function group(): Group
    {
        return new Group(
            $this->http,
            $this->apiKey,
            $this->apiUrl
        );
    }

    public function product(): Product
    {
        return new Product(
            $this->http,
            $this->apiKey,
            $this->apiUrl
        );
    }
}
