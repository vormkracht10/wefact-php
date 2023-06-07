<?php

namespace Vormkracht10\WeFact;

use GuzzleHttp\Client;
use Vormkracht10\WeFact\Resources\Group;
use Vormkracht10\WeFact\Resources\Debtor;
use Vormkracht10\WeFact\Resources\Invoice;
use Vormkracht10\WeFact\Resources\Product;
use Vormkracht10\WeFact\Resources\Creditor;
use Vormkracht10\WeFact\Resources\Subscription;
use Vormkracht10\WeFact\Resources\CreditInvoice;
use Vormkracht10\WeFact\Resources\Settings\Settings;
use Vormkracht10\WeFact\Resources\Settings\CostCategory;

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

    public function creditor(): Creditor
    {
        return new Creditor(
            $this->http,
            $this->apiKey,
            $this->apiUrl
        );
    }

    public function creditInvoice(): CreditInvoice
    {
        return new CreditInvoice(
            $this->http,
            $this->apiKey,
            $this->apiUrl,
        );
    }

    public function subscription(): Subscription
    {
        return new Subscription(
            $this->http,
            $this->apiKey,
            $this->apiUrl,
        );
    }

    public function settings(): Settings
    {
        return new Settings(
            $this->http,
            $this->apiKey,
            $this->apiUrl,
        );
    }

    public function costCategory(): CostCategory
    {
        return new CostCategory(
            $this->http,
            $this->apiKey,
            $this->apiUrl
        );
    }
}
