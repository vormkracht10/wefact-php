# PHP package for WeFact

![GitHub release (latest by date)](https://img.shields.io/github/v/release/vormkracht10/wefact-php)
[![Tests](https://github.com/vormkracht10/wefact-php/actions/workflows/run-tests.yml/badge.svg?branch=main)](https://github.com/vormkracht10/wefact-php/actions/workflows/run-tests.yml)
![Packagist PHP Version Support](https://img.shields.io/packagist/php-v/vormkracht10/wefact-php)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/vormkracht10/wefact-php.svg?style=flat-square)](https://packagist.org/packages/vormkracht10/wefact-php)
[![Total Downloads](https://img.shields.io/packagist/dt/vormkracht10/wefact-php.svg?style=flat-square)](https://packagist.org/packages/vormkracht10/wefact-php)

This package provides a fluent interface to communicate with the WeFact API. For the full documentation of the WeFact API, please visit [https://www.wefact.nl/api/](https://www.wefact.nl/api/).

<details>
<summary>Table of Contents</summary>

-   [Minimum requirements](#minimum-requirements)
-   [Installation](#installation)
-   [Usage](#usage)
-   [Available methods](#available-methods)

    -   [Creditor](#creditor)
        -   [List creditors](#list-creditors)
        -   [Create creditor](#create-creditor)
        -   [Update creditor](#update-creditor)
        -   [Show creditor](#show-creditor)
        -   [Delete creditor](#delete-creditor)
    -   [Credit Invoice](#credit-invoice)
        -   [List credit invoices](#list-credit-invoices)
        -   [Create credit invoice](#create-credit-invoice)
        -   [Update credit invoice](#update-credit-invoice)
        -   [Show credit invoice](#show-credit-invoice)
        -   [Delete credit invoice](#delete-credit-invoice)
    -   [Debtor](#debtor)
        -   [List debtors](#list-debtors)
        -   [Create debtor](#create-debtor)
        -   [Update debtor](#update-debtor)
        -   [Show debtor](#show-debtor)
    -   [Group](#group)
        -   [List groups](#list-groups)
        -   [Create group](#create-group)
        -   [Update group](#update-group)
        -   [Show group](#show-group)
        -   [Delete group](#delete-group)
    -   [Invoice](#invoice)
        -   [List invoices](#list-invoices)
        -   [Create invoice](#create-invoice)
        -   [Update invoice](#update-invoice)
        -   [Show invoice](#show-invoice)
        -   [Delete invoice](#delete-invoice)
        -   [Credit](#credit)
        -   [Part payment](#part-payment)
        -   [Mark as paid](#mark-as-paid)
        -   [Mark as unpaid](#mark-as-unpaid)
        -   [Send by email](#send-by-email)
        -   [Send reminder by email](#send-reminder-by-email)
        -   [Send summation by email](#send-summation-by-email)
        -   [Download](#download)
        -   [Block](#block)
        -   [Unblock](#unblock)
        -   [Schedule](#schedule)
        -   [Cancel schedule](#cancel-schedule)
        -   [Pause payment process](#pause-payment-process)
        -   [Reactivate payment process](#reactivate-payment-process)
        -   [Sort lines](#sort-lines)
        -   [Add invoice line](#add-invoice-line)
        -   [Delete invoice line](#delete-invoice-line)
        -   [Add attachment](#add-attachment)
        -   [Delete attachment](#delete-attachment)
        -   [Download attachment](#download-attachment)
    -   [Product](#product)
        -   [List products](#list-products)
        -   [Create product](#create-product)
        -   [Update product](#update-product)
        -   [Show product](#show-product)
        -   [Delete product](#delete-product)
    -   [Settings](#settings)
        -   [List settings](#list-settings)
    -   [Settings - Cost Category](#settings---cost-category)
        -   [List cost categories](#list-cost-categories)
        -   [Create cost category](#create-cost-category)
        -   [Update cost category](#update-cost-category)
        -   [Show cost category](#show-cost-category)
        -   [Delete cost category](#delete-cost-category)
    -   [Subscription](#subscription)
        -   [List subscriptions](#list-subscriptions)
        -   [Create subscription](#create-subscription)
        -   [Update subscription](#update-subscription)
        -   [Show subscription](#show-subscription)
        -   [Terminate subscription](#terminate-subscription)

-   [Testing](#testing)
-   [Changelog](#changelog)
-   [Contributing](#contributing)
-   [Security Vulnerabilities](#security-vulnerabilities)
-   [Credits](#credits)
-   [License](#license)
</details>

## Minimum requirements

-   PHP 8.1 or higher
-   Guzzle 7.0 or higher

## Installation

You can install the package via composer:

```bash
composer require vormkracht10/wefact-php
```

## Usage

Then you can use the package like this:

```php
$weFact = new Vormkracht10\WeFact('your-api-key');

$invoices = $weFact->invoice()->list();
```

## Available methods

### Creditor

#### List creditors

```php
$weFact->creditor()->list();
```

#### Create creditor

Required parameters: `CompanyName` or `SurName`.

```php
$weFact->creditor()->create([
    'CompanyName' => 'Your company name',
  ])
```

#### Update creditor

Required parameter: `Identifier` or `CreditorCode`.

```php
$weFact->creditor()->edit([
    'Identifier' => $creditorId,
    'CompanyName' => 'Your company name',
  ])
```

#### Show creditor

Required parameter: `Identifier` or `CreditorCode`.

```php
$weFact->creditor()->show(['Identifier' => $creditorId]);
// or
$weFact->creditor()->show(['CreditorCode' => $creditorCode]);
```

#### Delete creditor

Required parameter: `Identifier` or `CreditorCode`.

```php
$weFact->creditor()->delete(['Identifier' => $creditorId]);
// or
$weFact->creditor()->delete(['CreditorCode' => $creditorCode]);
```

### Credit Invoice

#### List credit invoices

```php
$weFact->creditInvoice()->list();
```

#### Create credit invoice

Required parameters: `InvoiceCode`, `Creditor` or `CreditorCode` and `InvoiceLines`.

```php
$weFact->creditInvoice()->create([
    'InvoiceCode' => 'your-invoice-code',
    'CreditorCode' => 'CD10001'
    'InvoiceLines' => [
        [
            'Description' => 'Your description',
            'PriceExcl' => 10,
        ],
    ],
  ])
```

#### Update credit invoice

Required parameter: `Identifier` or `CreditInvoiceCode`.

```php
$weFact->creditInvoice()->edit([
    'Identifier' => $creditInvoiceId,
    'Comment' => 'Your comment',
  ])
```

#### Show credit invoice

Required parameter: `Identifier` or `CreditInvoiceCode`.

```php
$weFact->creditInvoice()->show(['Identifier' => $creditInvoiceId]);
// or
$weFact->creditInvoice()->show(['CreditInvoiceCode' => $creditInvoiceCode]);
```

#### Delete credit invoice

Required parameter: `Identifier` or `CreditInvoiceCode`.

```php
$weFact->creditInvoice()->delete(['Identifier' => $creditInvoiceId]);
// or
$weFact->creditInvoice()->delete(['CreditInvoiceCode' => $creditInvoiceCode]);
```

### Debtor

#### List debtors

```php
$weFact->debtor()->list();
```

#### Create debtor

Required parameters: `CompanyName` or `SurName`.

```php
$weFact->debtor()->create([
    'CompanyName' => 'Your company name',
  ])
```

#### Update debtor

Required parameter: `Identifier` or `DebtorCode`, `CompanyName` or `SurName`.

```php
$weFact->debtor()->edit([
    'Identifier' => $debtorId,
    'CompanyName' => 'Your company name',
  ])
```

#### Show debtor

Required parameter: `Identifier` or `DebtorCode`.

```php
$weFact->debtor()->show(['Identifier' => $debtorId]);
// or
$weFact->debtor()->show(['DebtorCode' => $debtorCode]);
```

### Group

#### List groups

Required parameter: `Type`.

```php
$weFact->group()->list([
    'type' => 'debtor',
]);
```

#### Create group

Required parameters: `Type` and `GroupName`.

```php
$weFact->group()->create([
    'Type' => 'debtor',
    'GroupName' => 'Your group name',
  ])
```

#### Update group

Required parameter: `Identifier`.

```php
$weFact->group()->edit([
    'Identifier' => $groupId,
    'GroupName' => 'Your group name',
  ])
```

#### Show group

Required parameter: `Identifier`.

```php
$weFact->group()->show(['Identifier' => $groupId]);
```

#### Delete group

Required parameter: `Identifier`.

```php
$weFact->group()->delete(['Identifier' => $groupId]);
```

### Invoice

#### List invoices

```php
$weFact->invoice()->list();
```

#### Create invoice

Required parameters: `DebtorCode` or `DebtorCode` and `InvoiceLines`.

```php
$weFact->invoice()->create([
    'DebtorCode' => 'DB10000',
    'InvoiceLines' => [
      [
        'Number' => 1,
        'ProductCode' => 'P0001'
      ]
    ],
    [
      'Description' => 'Your product description',
      'PriceExcl' => 100
    ]
  ])
```

#### Update invoice

Required parameter: `Identifier` or `InvoiceCode`.

```php
$weFact->invoice()->edit([
    'Identifier' => $invoiceId,
    'InvoiceLines' => [
      [
        'Number' => 1,
        'ProductCode' => 'P0001'
      ]
    ],
    [
      'Description' => 'Your product description',
      'PriceExcl' => 100
    ]
  ])
```

#### Show invoice

Required parameter: `Identifier` or `InvoiceCode`.

```php
$weFact->invoice()->show(['Identifier' => $invoiceId]);
// or
$weFact->invoice()->show(['InvoiceCode' => $invoiceCode]);
```

#### Delete invoice

Required parameter: `Identifier` or `InvoiceCode`.

```php
$weFact->invoice()->delete(['Identifier' => $invoiceId]);
// or
$weFact->invoice()->delete(['InvoiceCode' => $invoiceCode]);
```

#### Credit

Required parameter: `Identifier` or `InvoiceCode`.

```php
$weFact->invoice()->credit(['Identifier' => $invoiceId]);
// or
$weFact->invoice()->credit(['InvoiceCode' => $invoiceCode]);
```

#### Part payment

Required parameter: `Identifier` or `InvoiceCode`.

```php
$weFact->invoice()->partPayment(['Identifier' => $invoiceId]);
// or
$weFact->invoice()->partPayment(['InvoiceCode' => $invoiceCode]);
```

#### Mark invoice as paid

Required parameter: `Identifier` or `InvoiceCode`.

```php
$weFact->invoice()->markAsPaid(['Identifier' => $invoiceId]);
// or
$weFact->invoice()->markAsPaid(['InvoiceCode' => $invoiceCode]);
```

#### Mark invoice as unpaid

Required parameter: `Identifier` or `InvoiceCode`.

```php
$weFact->invoice()->markAsUnpaid(['Identifier' => $invoiceId]);
// or
$weFact->invoice()->markAsUnpaid(['InvoiceCode' => $invoiceCode]);
```

#### Send by email

Required parameter: `Identifier` or `InvoiceCode`.

```php
$weFact->invoice()->sendByEmail(['Identifier' => $invoiceId]);
// or
$weFact->invoice()->sendByEmail(['InvoiceCode' => $invoiceCode]);
```

#### Send reminder by email

Required parameter: `Identifier` or `InvoiceCode`.

```php
$weFact->invoice()->sendReminderByEmail(['Identifier' => $invoiceId]);
// or
$weFact->invoice()->sendReminderByEmail(['InvoiceCode' => $invoiceCode]);
```

#### Download

Required parameter: `Identifier` or `InvoiceCode`.

```php
$weFact->invoice()->download(['Identifier' => $invoiceId]);
// or
$weFact->invoice()->download(['InvoiceCode' => $invoiceCode]);
```

#### Block

Required parameter: `Identifier` or `InvoiceCode`.

```php
$weFact->invoice()->block(['Identifier' => $invoiceId]);
// or
$weFact->invoice()->block(['InvoiceCode' => $invoiceCode]);
```

#### Unblock

Required parameter: `Identifier` or `InvoiceCode`.

```php
$weFact->invoice()->unblock(['Identifier' => $invoiceId]);
// or
$weFact->invoice()->unblock(['InvoiceCode' => $invoiceCode]);
```

#### Schedule

Required parameter: `Identifier` or `InvoiceCode` and `ScheduledAt`.

```php
$weFact->invoice()->schedule([
    'Identifier' => $invoiceId,
    'ScheduledAt' => '2020-01-01 00:00:00'
  ])
// or
$weFact->invoice()->schedule([
    'InvoiceCode' => $invoiceCode,
    'ScheduledAt' => '2020-01-01 00:00:00'
  ])
```

#### Cancel schedule

Required parameter: `Identifier` or `InvoiceCode`.

```php
$weFact->invoice()->cancelSchedule(['Identifier' => $invoiceId]);
// or
$weFact->invoice()->cancelSchedule(['InvoiceCode' => $invoiceCode]);
```

#### Pause payment process

Required parameter: `Identifier` or `InvoiceCode`.

```php
$weFact->invoice()->paymentProcessPause(['Identifier' => $invoiceId]);
// or
$weFact->invoice()->paymentProcessPause(['InvoiceCode' => $invoiceCode]);
```

#### Reactivate payment process

Required parameter: `Identifier` or `InvoiceCode`.

```php
$weFact->invoice()->paymentProcessReactivate(['Identifier' => $invoiceId]);
// or
$weFact->invoice()->paymentProcessReactivate(['InvoiceCode' => $invoiceCode]);
```

#### Sort lines

Required parameter: `Identifier` or `InvoiceCode` and `InvoiceLines Identifier`.

```php
$weFact->invoice()->sortLines([
    'Identifier' => $invoiceId,
    'InvoiceLines' => [
      [
        'Identifier' => $invoiceLineId,
      ]
    ]
  ]);
```

#### Add invoice line

Required parameter: `Identifier` or `InvoiceCode` and `InvoiceLines`.

```php
$weFact->invoice()->addLine([
    'Identifier' => $invoiceId,
    'InvoiceLines' => [
      [
        'Number' => 1,
        'ProductCode' => 'P0001'
      ]
    ],
  ]);
```

#### Delete invoice line

Required parameter: `Identifier` or `InvoiceCode` and `InvoiceLines Identifier`.

```php
$weFact->invoice()->deleteLine([
    'Identifier' => $invoiceId,
    'InvoiceLines' => [
      [
        'Identifier' => $invoiceLineId,
      ]
    ]
  ]);
```

#### Add attachment

Required parameter: `ReferenceIdentifier` or `InvoiceCode`, `Tyoe`, `Filename` and `Base64`.

```php
$weFact->invoice()->addAttachment([
    'ReferenceIdentifier' => $invoiceId,
    'Type' => 'invoice',
    'Filename' => 'test.pdf',
    'Base64' => 'base64string'
  ]);
```

#### Delete attachment

Required parameter: `Identifier` or `Filename`, `ReferenceIdentifier` or `InvoiceCode` and `Type`.

```php
$weFact->invoice()->deleteAttachment([
    'Identifier' => $attachmentId,
    'ReferenceIdentifier' => $invoiceId,
    'Type' => 'invoice',
  ]);
```

#### Download attachment

Required parameter: `Identifier` or `Filename`, `ReferenceIdentifier` or `InvoiceCode` and `Type`.

```php
$weFact->invoice()->downloadAttachment([
    'ReferenceIdentifier' => $invoiceId,
    'Filename' => 'test.pdf',
    'Type' => 'invoice',
  ]);
```

### Product

#### List products

```php
$weFact->product()->list();
```

#### Create product

Required parameters: `ProductName`, `ProductKeyPhrase` and `PriceExcl`.

```php
$weFact->product()->create([
    'ProductName' => 'Your product name',
    'ProductKeyPhrase' => 'Your product key phrase',
    'PriceExcl' => 100
  ])
```

#### Update product

Required parameter: `Identifier` or `ProductCode`.

```php
$weFact->product()->edit([
    'Identifier' => $productId,
    'ProductName' => 'Your product name',
    'ProductKeyPhrase' => 'Your product key phrase',
    'PriceExcl' => 100
  ])
```

#### Show product

Required parameter: `Identifier`

```php
$weFact->product()->show(['Identifier' => $productId]);
```

#### Delete product

Required parameter: `Identifier` or `ProductCode`.

```php
$weFact->product()->delete(['Identifier' => $productId]);
// or
$weFact->product()->delete(['ProductCode' => $productCode]);
```

### Settings

#### List settings

```php
$weFact->settings()->list();
```

### Settings - Cost Category

#### List cost categories

```php
$weFact->costCategory()->list();
```

#### Create cost category

Required parameters: `Title`.

```php
$weFact->costCategory()->create([
    'Title' => 'Your cost category title',
  ]);
```

#### Update cost category

Required parameter: `Identifier`.

```php
$weFact->costCategory()->edit([
  'Identifier' => $costCategoryId,
]);
```

#### Show cost category

Required parameter: `Identifier`.

```php
$weFact->costCategory()->show(['Identifier' => $costCategoryId]);
```

#### Delete cost category

Required parameter: `Identifier`.

```php
$weFact->costCategory()->delete(['Identifier' => $costCategoryId]);
```

### Subscription

#### List subscriptions

```php
$weFact->subscription()->list();
```

#### Create subscription

Required parameters: `Debtor` or `DebtorCode` and `ProductCode`. When `ProductCode` is empty, `Description`, `PriceExcl` and `Periodic` are required.

> Please note: You can pass either the `TerminateAfter` or the `TerminationDate`, not both. The `TerminateAfter` includes the number of times the subscription has been billed in the past.

```php
$weFact->subscription()->create([
    'DebtorCode' => 'DB10000',
    'ProductCode' => 'P0001',
    'Description' => 'Your product description',
    'PriceExcl' => 100,
    'Periodic' => 'month',
    'TerminateAfter' => 12
  ])
```

#### Update subscription

Required parameter: `Identifier`.

> Please note: You can pass either the `TerminateAfter` or the `TerminationDate`, not both. The `TerminateAfter` includes the number of times the subscription has been billed in the past.

```php
$weFact->subscription()->edit([
    'Identifier' => $subscriptionId,
    'Description' => 'Your product description',
    'PriceExcl' => 100,
    'Periodic' => 'month',
    'TerminateAfter' => 12
  ])
```

#### Show subscription

Required parameter: `Identifier`.

```php
$weFact->subscription()->show(['Identifier' => $subscriptionId]);
```

#### Terminate subscription

Required parameter: `Identifier`.

```php
$weFact->subscription()->terminate(['Identifier' => $subscriptionId]);
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

-   [Bas van Dinther](https://github.com/vormkracht10)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
