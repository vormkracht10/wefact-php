# PHP package for WeFact

![GitHub release (latest by date)](https://img.shields.io/github/v/release/vormkracht10/wefact-php)
[![Tests](https://github.com/vormkracht10/wefact-php/actions/workflows/run-tests.yml/badge.svg?branch=main)](https://github.com/vormkracht10/wefact-php/actions/workflows/run-tests.yml)
![Packagist PHP Version Support](https://img.shields.io/packagist/php-v/vormkracht10/wefact-php)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/vormkracht10/wefact-php.svg?style=flat-square)](https://packagist.org/packages/vormkracht10/wefact-php)
[![Total Downloads](https://img.shields.io/packagist/dt/vormkracht10/wefact-php.svg?style=flat-square)](https://packagist.org/packages/vormkracht10/wefact-php)

This package provides a fluent interface to communicate with the WeFact API.

-   [Installation](#installation)
-   [Usage](#usage)
-   [Available methods](#available-methods)
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
    -   [Product](#product)
        -   [List products](#list-products)
        -   [Create product](#create-product)
        -   [Update product](#update-product)
        -   [Show product](#show-product)
        -   [Delete product](#delete-product)
-   [Testing](#testing)
-   [Changelog](#changelog)
-   [Contributing](#contributing)
-   [Security Vulnerabilities](#security-vulnerabilities)
-   [Credits](#credits)
-   [License](#license)

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

For the full documentation of the WeFact API, please visit [https://www.wefact.nl/api/](https://www.wefact.nl/api/).

### Debtor

<!-- Show list, add and edit -->

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

```php
$weFact->group()->list();
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
