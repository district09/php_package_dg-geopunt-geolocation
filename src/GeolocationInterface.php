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
     *
     * @return \DigipolisGent\Geopunt\Geolocation\Value\Locations
     *   Collection of location values.
     */
    public function locationsBySearch(string $search, int $limit): Locations;
}
