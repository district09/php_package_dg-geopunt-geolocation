<?php

declare(strict_types=1);

namespace DigipolisGent\Geopunt\Geolocation\Normalizer\FromJson;

use DigipolisGent\Geopunt\Geolocation\Value\Location;
use DigipolisGent\Geopunt\Geolocation\Value\LocationId;

/**
 * Normalizes JSON data into a location value.
 */
final class LocationNormalizer
{
    /**
     * Normalize the json data.
     *
     * @param object $jsonData
     *
     * @return \DigipolisGent\Geopunt\Geolocation\Value\Location
     */
    public function normalize(object $jsonData): Location
    {
        $addressNormalizer = new AddressNormalizer();
        $positionNormalizer = new PositionNormalizer();
        $boundingBoxNormalizer = new BoundingBoxNormalizer();

        return new Location(
            new LocationId($jsonData->ID),
            $jsonData->LocationType,
            $addressNormalizer->normalize($jsonData),
            $positionNormalizer->normalize($jsonData->Location),
            $boundingBoxNormalizer->normalize($jsonData->BoundingBox)
        );
    }
}
