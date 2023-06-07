<?php

use GuzzleHttp\Psr7\Response;
use Vormkracht10\WeFact\WeFact;
use Vormkracht10\WeFact\Resources\Group;
use Vormkracht10\WeFact\Resources\Debtor;
use Vormkracht10\WeFact\Resources\Invoice;
use Vormkracht10\WeFact\Resources\Product;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;

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