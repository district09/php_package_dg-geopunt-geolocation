# digipolisgent/geopunt-geolocation package

Package to lookup addresses using the
[AGIV Geopunt geolocation API][geopunt.api].

The Geolocation API provides resources for auto-completion, geocoding and
reverse geocoding within the regions of Flanders and Brussels.

[![Github][github-badge]][github-link]

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

[github-badge]: https://img.shields.io/badge/github-DigipolisGent_Geopunt_Geolocation-blue.svg?logo=github
[github-link]: https://github.com/digipolisgent/php_package_dg-geopunt-geolocation

[travis-master-badge]: https://travis-ci.com/digipolisgent/php_package_dg-geopunt-geolocation.svg?branch=master "Travis build master"
[travis-master-link]: https://travis-ci.com/digipolisgent/php_package_dg-geopunt-geolocation/branches
[travis-develop-badge]: https://travis-ci.com/digipolisgent/php_package_dg-geopunt-geolocation.svg?branch=develop "Travis build develop"
[travis-develop-link]: https://travis-ci.com/digipolisgent/php_package_dg-geopunt-geolocation/branches

[codeclimate-maint-badge]: https://api.codeclimate.com/v1/badges/a814025cd03bece885f8/maintainability
[codeclimate-maint-link]: https://codeclimate.com/github/digipolisgent/php_package_dg-geopunt-geolocation/maintainability
[codeclimate-cover-badge]: https://api.codeclimate.com/v1/badges/a814025cd03bece885f8/test_coverage
[codeclimate-cover-link]: https://codeclimate.com/github/digipolisgent/php_package_dg-geopunt-geolocation/test_coverage
