<?php

use Vormkracht10\WeFact\Resources\Debtor;
use Vormkracht10\WeFact\Resources\Group;
use Vormkracht10\WeFact\Resources\Invoice;
use Vormkracht10\WeFact\Resources\Product;
use Vormkracht10\WeFact\Resources\Settings\CostCategory;
use Vormkracht10\WeFact\Resources\Settings\Settings;
use Vormkracht10\WeFact\Resources\Subscription;
use Vormkracht10\WeFact\WeFact;

it('can create wefact instance', function () {
    $apiKey = 'FAKE_API_KEY';
    $apiUrl = 'https://api.mijnwefact.nl/v2/';

    $weFact = new WeFact($apiKey);
    $weFact->setApiUrl($apiUrl);

    expect($weFact)->toBeInstanceOf(WeFact::class);
    expect($weFact->getApiUrl())->toBe($apiUrl);
    expect($weFact->invoices())->toBeInstanceOf(Invoice::class);
    expect($weFact->debtors())->toBeInstanceOf(Debtor::class);
    expect($weFact->groups())->toBeInstanceOf(Group::class);
    expect($weFact->products())->toBeInstanceOf(Product::class);
    expect($weFact->settings())->toBeInstanceOf(Settings::class);
    expect($weFact->costCategories())->toBeInstanceOf(CostCategory::class);
    expect($weFact->subscriptions())->toBeInstanceOf(Subscription::class);
});

it('can return an error when non existing API key is used', function () {
    $apiKey = 'FAKE_API_KEY';
    $weFact = new WeFact($apiKey);

    $weFact->invoices()->list();
})->throws(\Vormkracht10\WeFact\Exceptions\InvalidRequestException::class);
