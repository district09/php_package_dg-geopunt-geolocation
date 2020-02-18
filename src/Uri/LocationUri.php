<?php

declare(strict_types=1);

namespace DigipolisGent\Geopunt\Geolocation\Uri;

/**
 * Uri to lookup locations based on a given filters.
 */
class LocationUri extends AbstractUriWithQuery
{
    /**
     * @inheritDoc
     */
    protected function getPath(): string
    {
        return 'Location';
    }
}
