<?php

declare(strict_types=1);

namespace DigipolisGent\Geopunt\Geolocation\Normalizer\FromJson;

use DigipolisGent\Geopunt\Geolocation\Value\Position\Lambert72Point;
use DigipolisGent\Geopunt\Geolocation\Value\Position\Position;
use DigipolisGent\Geopunt\Geolocation\Value\Position\Wgs84Point;

/**
 * Normalizes JSON data into a position value.
 */
final class PositionNormalizer
{
    /**
     * Normalize the json data.
     *
     * @param object $jsonData
     *
     * @return \DigipolisGent\Geopunt\Geolocation\Value\Position\Position
     */
    public function normalize(object $jsonData): Position
    {
        return new Position(
            new Wgs84Point(
                $jsonData->Lon_WGS84,
                $jsonData->Lat_WGS84
            ),
            new Lambert72Point(
                $jsonData->X_Lambert72,
                $jsonData->Y_Lambert72
            )
        );
    }
}
