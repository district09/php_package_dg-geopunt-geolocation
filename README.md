# digipolisgent/geopunt-geolocation package

Package to lookup addresses using the
[AGIV Geopunt geolocation API][geopunt.api].

The Geolocation API provides resources for auto-completion, geocoding and
reverse geocoding within the regions of Flanders and Brussels.

[![Github][github-badge]][github-link]
[![License][license-badge]][license-link]
[![Packagist][packagist-version-badge]][packagist-version-link]

[![Build Status Master][travis-master-badge]][travis-master-link]
[![Build Status Develop][travis-develop-badge]][travis-develop-link]
[![Maintainability][codeclimate-maint-badge]][codeclimate-maint-link]
[![Test Coverage][codeclimate-cover-badge]][codeclimate-cover-link]

## Install

Install the package using composer:

```bash
composer digipolisgent/geopunt-geolocation
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed
recently.

## Examples

See the [examples](examples) directory how to use the service wrappers.

## Testing

Run the test suite:

``` bash
composer install
vendor/bin/phpunit
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more
information.

[geopunt.api]: https://loc.geopunt.be/

[github-badge]: https://img.shields.io/badge/github-DigipolisGent_Geopunt_Geolocation-blue.svg?logo=github&style=flat-square
[github-link]: https://github.com/digipolisgent/php_package_dg-geopunt-geolocation

[license-badge]: https://img.shields.io/github/license/digipolisgent/php_package_dg-geopunt-geolocation?style=flat-square
[license-link]: LICENSE.md

[packagist-version-badge]: https://img.shields.io/packagist/v/digipolisgent/geopunt-geolocation?style=flat-square&include_prereleases
[packagist-version-link]: https://packagist.org/packages/digipolisgent/geopunt-geolocation

[travis-master-badge]: https://img.shields.io/travis/com/digipolisgent/php_package_dg-geopunt-geolocation/master.svg?label=master&logo=travis&style=flat-square
[travis-master-link]: https://travis-ci.com/digipolisgent/php_package_dg-geopunt-geolocation/branches
[travis-develop-badge]: https://img.shields.io/travis/com/digipolisgent/php_package_dg-geopunt-geolocation/develop.svg?label=develop&logo=travis&style=flat-square
[travis-develop-link]: https://travis-ci.com/digipolisgent/php_package_dg-geopunt-geolocation/branches

[codeclimate-maint-badge]: https://img.shields.io/codeclimate/maintainability/digipolisgent/php_package_dg-geopunt-geolocation?logo=code-climate&style=flat-square
[codeclimate-maint-link]: https://codeclimate.com/github/digipolisgent/php_package_dg-geopunt-geolocation
[codeclimate-cover-badge]: https://img.shields.io/codeclimate/coverage/digipolisgent/php_package_dg-geopunt-geolocation?logo=code-climate&style=flat-square
[codeclimate-cover-link]: https://codeclimate.com/github/digipolisgent/php_package_dg-geopunt-geolocation
