# Read and write CSV files with PHP.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ryangjchandler/csv.svg?style=flat-square)](https://packagist.org/packages/ryangjchandler/csv)
[![Tests](https://github.com/ryangjchandler/csv/actions/workflows/run-tests.yml/badge.svg?branch=main)](https://github.com/ryangjchandler/csv/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/ryangjchandler/csv.svg?style=flat-square)](https://packagist.org/packages/ryangjchandler/csv)

This package provides a minimalistic wrapper around the excellent [`league/csv`](https://csv.thephpleague.com/) package. The API is heavily inspired by [Ruby's `CSV` class](https://ruby-doc.org/stdlib-3.0.0/libdoc/csv/rdoc/CSV.html).

## Installation

You can install the package via Composer:

```bash
composer require ryangjchandler/csv
```

## Usage

### Looping over each row in a file

To loop over each row in a CSV file, you can use the `Csv::foreach` method.

```php
use RyanChandler\Csv\Csv;

Csv::foreach('/path/to/file', do: function (array $record, int $offset): void {

});
```

The callback function provided will receive each row in the file as an array.

By default a header row will be read from the top of the file. If you wish to disable this behaviour you can provide a named boolean `header` argument:

```php
Csv::foreach('/path/to/file', do: function (array $record, int $offset): void {

}, header: false);
```

If the header for the file isn't on the first row, you can specify the row offset with the `headerOffset` named argument:

```php
Csv::foreach('/path/to/file', do: function (array $record, int $offset): void {

}, headerOffset: 10);
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Ryan Chandler](https://github.com/ryangjchandler)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
