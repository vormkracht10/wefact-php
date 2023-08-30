# Changelog

All notable changes to `wefact-php` will be documented in this file.

## v0.6.0 - 2023-08-30

### What's Changed

- Bump dependabot/fetch-metadata from 1.5.1 to 1.6.0 by @dependabot in https://github.com/vormkracht10/wefact-php/pull/3
- List all method by @Baspa in https://github.com/vormkracht10/wefact-php/pull/4

### New Contributors

- @Baspa made their first contribution in https://github.com/vormkracht10/wefact-php/pull/4

**Full Changelog**: https://github.com/vormkracht10/wefact-php/compare/v0.5.0...v0.6.0

## v0.5.0 - 2023-06-13

Removed `InvalidRequestException` and use Guzzle Client Exceptions.

## v0.4.0 - 2023-06-08

Change singular resource method names to plural.

## v0.3.0 - 2023-06-07

This release includes all remaining `Invoice` resource methods.

## v0.2.0 - 2023-06-07

- Added default resource methods to all remaining resources (`CreditInvoice`, `Creditor`, `Subscription`)
- Added `InvalidRequestException` when API request is invalid and returns error

## v0.1.0 - 2023-06-07

The first release only (partially) includes the resources listed down below:

- Debtor
- Group
- Invoice
- Product

Every resource only contains the `list`, `create`, `update`, `show` and `delete` methods. Except for debtor which does not have the `delete` method.
