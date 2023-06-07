# PHP package for WeFact

![GitHub release (latest by date)](https://img.shields.io/github/v/release/vormkracht10/wefact-php)
[![Tests](https://github.com/vormkracht10/wefact-php/actions/workflows/run-tests.yml/badge.svg?branch=main)](https://github.com/vormkracht10/wefact-php/actions/workflows/run-tests.yml)
![Packagist PHP Version Support](https://img.shields.io/packagist/php-v/vormkracht10/wefact-php)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/vormkracht10/wefact-php.svg?style=flat-square)](https://packagist.org/packages/vormkracht10/wefact-php)
[![Total Downloads](https://img.shields.io/packagist/dt/vormkracht10/wefact-php.svg?style=flat-square)](https://packagist.org/packages/vormkracht10/wefact-php)

This package rovides a fluent interface to communicate with the WeFact API.

-   [Installation](#installation)
-   [Usage](#usage)
-   [Available methods](#available-methods)
    -   [Invoice](#invoice)
        -   [List invoices](#list-invoices)
        -   [Create invoice](#create-invoice)
        -   [Update invoice](#update-invoice)
        -   [Show invoice](#show-invoice)
        -   [Delete invoice](#delete-invoice)
-   [Testing](#testing)
-   [Changelog](#changelog)
-   [Contributing](#contributing)
-   [Security Vulnerabilities](#security-vulnerabilities)
-   [Credits](#credits)
-   [License](#license)

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
