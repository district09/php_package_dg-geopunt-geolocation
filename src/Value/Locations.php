<?php

declare(strict_types=1);

namespace DigipolisGent\Geopunt\Geolocation\Value;

use DigipolisGent\Value\CollectionAbstract;

/**
 * A collection of location values.
 */
final class Locations extends CollectionAbstract
{
    /**
     * Create the collection from location objects.
     *
     * @param \DigipolisGent\Geopunt\Geolocation\Value\LocationInterface ...$locations
     */
    public function __construct(LocationInterface ...$locations)
    {
        $this->values = $locations;
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return implode(PHP_EOL, $this->values);
    }
}
