<?php

declare(strict_types=1);

namespace DigipolisGent\Geopunt\Geolocation\Request;

use DigipolisGent\Geopunt\Geolocation\Filter\Filters;
use DigipolisGent\Geopunt\Geolocation\Uri\LocationUri;

/**
 * Request to get location(s) based on given filters.
 */
final class LocationRequest extends AbstractJsonRequest
{
    /**
     * Create a new location request.
     *
     * @param \DigipolisGent\Geopunt\Geolocation\Filter\Filters $filters
     */
    public function __construct(Filters $filters)
    {
        parent::__construct(
            new LocationUri($filters)
        );
    }
}
