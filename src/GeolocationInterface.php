<?php

declare(strict_types=1);

namespace DigipolisGent\Geopunt\Geolocation;

use DigipolisGent\API\Cache\CacheableInterface;
use DigipolisGent\API\Logger\LoggableInterface;
use DigipolisGent\Geopunt\Geolocation\Value\Locations;
use DigipolisGent\Geopunt\Geolocation\Value\Suggestions;

/**
 * API wrapper to access the geolocation service methods.
 */
interface GeolocationInterface extends CacheableInterface, LoggableInterface
{
    /**
     * Get the suggestions based on query string and maximum amount of results.
     *
     * @param string $search
     *   The query string (partial address) to lookup the suggestions.
     * @param int $limit
     *   The maximum number of suggestions to return.
     *   This amount should be greater than 0 and less than or equal to 25.
     *
     * @return \DigipolisGent\Geopunt\Geolocation\Value\Suggestions
     *   Collection of suggestion values.
     */
    public function suggestions(string $search, int $limit): Suggestions;

    /**
     * Get the locations based on query string and maximum amount of results.
     *
     * @param string $search
     *   The query string (partial address) to lookup the locations.
     * @param int $limit
     *   The maximum number of locations to return.
     *   This amount should be greater than 0 and less than or equal to 5.
     * @param string|null $restrictByType
     *   Optionaly restrict the location(s) by the field type.
     *   The allowed types are defined in Filter\RestrictByTypeFilter:
     *   - RestrictByTypeFilter::MUNICIPALITY_NAME
     *   - RestrictByTypeFilter::STREETNAME
     *   - RestrictByTypeFilter::HOUSENUMBER
     *
     * @return \DigipolisGent\Geopunt\Geolocation\Value\Locations
     *   Collection of location values.
     */
    public function locationsBySearch(string $search, int $limit, ?string $restrictByType = null): Locations;

    /**
     * Get the locations by WGS84 latititude & longitude values.
     *
     * @param float $latitude
     *   The latitude to search by.
     * @param float $longitude
     *   The longitude to search by.
     * @param int $limit
     *   The maximum number of locations to return.
     *   This amount should be greater than 0 and less than or equal to 5.
     *
     * @return \DigipolisGent\Geopunt\Geolocation\Value\Locations
     *   Collection of location values.
     */
    public function locationsByLatitudeLongitude(float $latitude, float $longitude, int $limit): Locations;

    /**
     * Get the locations by Lambert 72 x & y values.
     *
     * @param float $xPosition
     *   The x value to search by.
     * @param float $yPosition
     *   The y value to search by.
     * @param int $limit
     *   The maximum number of locations to return.
     *   This amount should be greater than 0 and less than or equal to 5.
     *
     * @return \DigipolisGent\Geopunt\Geolocation\Value\Locations
     *   Collection of location values.
     */
    public function locationsByXY(float $xPosition, float $yPosition, int $limit): Locations;
}
