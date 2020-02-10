<?php

declare(strict_types=1);

namespace DigipolisGent\Geopunt\Geolocation\Filter;

/**
 * Filter by the location type string.
 */
final class LocationTypeFilter extends AbstractFilter
{
    /**
     * @inheritDoc
     */
    public function name(): string
    {
        return 'type';
    }
}
