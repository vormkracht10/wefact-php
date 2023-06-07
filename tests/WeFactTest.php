<?php

use Vormkracht10\WeFact\Resources\Debtor;
use Vormkracht10\WeFact\Resources\Group;
use Vormkracht10\WeFact\Resources\Invoice;
use Vormkracht10\WeFact\Resources\Product;
use Vormkracht10\WeFact\WeFact;

it('can create wefact instance', function () {
    $apiKey = 'FAKE_API_KEY';
    $apiUrl = 'https://api.mijnwefact.nl/v2/';

    $weFact = new WeFact($apiKey);
    $weFact->setApiUrl($apiUrl);

    expect($weFact)->toBeInstanceOf(WeFact::class);
    expect($weFact->getApiUrl())->toBe($apiUrl);
    expect($weFact->invoice())->toBeInstanceOf(Invoice::class);
    expect($weFact->debtor())->toBeInstanceOf(Debtor::class);
    expect($weFact->group())->toBeInstanceOf(Group::class);
    expect($weFact->product())->toBeInstanceOf(Product::class);
});

it('can return an error when non existing API key is used', function () {
    $apiKey = 'FAKE_API_KEY';
    $weFact = new WeFact($apiKey);
    
    $weFact->invoice()->list();
})->throws(\Vormkracht10\WeFact\Exceptions\InvalidRequestException::class);
