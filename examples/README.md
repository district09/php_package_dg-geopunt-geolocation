# AGIV Geopunt Geolocation API : Examples

This directory contains examples of how to use the
`\DigipolisGent\Geopunt\Geolocation` package and to retrieve data
from the "[AGIV Geopunt geolocation API][geolocation.api]".

## Install

The examples require the `config.php` file being in place and filled in.

Copy the `config.example.php` file to `config.php` and fill in the
values. Do not alter the example scripts, all variables are defined in
the `config.php` file.

Install the libraries:

```bash
composer install
```

## Examples

* `101-Suggestions.php` : Get address suggestions based on a (partial) address
  string.
* `111-Location.php` : Get the address details based on a address string.

## Usage

The scripts can only be called from command line.

Example:

```bash
php 101-Suggestions.php
```

[geolocation.api]: https://loc.geopunt.be/
