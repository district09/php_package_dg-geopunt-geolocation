<?php

declare(strict_types=1);

namespace DigipolisGent\Geopunt\Geolocation\Normalizer\FromJson;

use DigipolisGent\Geopunt\Geolocation\Value\Locations;

/**
 * Normalizes JSON data into a locations collection.
 */
final class LocationsNormalizer
{
    /**
     * Normalize the json data.
     *
     * @param object $jsonData
     *
     * @return \DigipolisGent\Geopunt\Geolocation\Value\Locations
     */
    public function normalize(object $jsonData): Locations
    {
        $locationNormalizer = new LocationNormalizer();

        $locations = [];
        foreach ($jsonData->LocationResult as $locationResult) {
            $locations[] = $locationNormalizer->normalize($locationResult);
        }

        return new Locations(...$locations);
    }
}
