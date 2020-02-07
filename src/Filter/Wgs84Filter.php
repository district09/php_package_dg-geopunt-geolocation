<?php

declare(strict_types=1);

namespace DigipolisGent\Geopunt\Geolocation\Filter;

use DigipolisGent\Geopunt\Geolocation\Value\Position\Wgs84Point;

/**
 * Filter by WGS84 latitude longitude coordinates.
 */
final class Wgs84Filter extends AbstractFilter
{
    /**
     * Create the filter from Wgs84 point.
     *
     * @param \DigipolisGent\Geopunt\Geolocation\Value\Position\Wgs84Point $point
     *
     * @return \DigipolisGent\Geopunt\Geolocation\Filter\Wgs84Filter
     */
    public static function fromWgs84Point(Wgs84Point $point): Wgs84Filter
    {
        return new static(
            sprintf('%s,%s', $point->yPosition(), $point->xPosition())
        );
    }

    /**
     * Create the filter from latitude and longitude values.
     *
     * @param float $latitude
     * @param float $longitude
     *
     * @return \DigipolisGent\Geopunt\Geolocation\Filter\Wgs84Filter
     */
    public static function fromLatitudeLongitude(float $latitude, float $longitude): Wgs84Filter
    {
        $point = new Wgs84Point($longitude, $latitude);

        return static::fromWgs84Point($point);
    }

    /**
     * @inheritDoc
     */
    public function name(): string
    {
        return 'latlon';
    }
}
