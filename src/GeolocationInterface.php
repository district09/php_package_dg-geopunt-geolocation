<?php

declare(strict_types=1);

namespace DigipolisGent\Geopunt\Geolocation;

use DigipolisGent\API\Cache\CacheableInterface;
use DigipolisGent\API\Logger\LoggableInterface;
use DigipolisGent\Geopunt\Geolocation\Value\Suggestions;

/**
 * API wrapper to access the geolocation service methods.
 */
interface GeolocationInterface extends CacheableInterface, LoggableInterface
{
    /**
     * Get the suggestions based on query string and maximum amount of results.
     *
     * @param string $query
     *   The query string (partial address) to lookup the suggestions.
     * @param int $amount
     *   The maximum number of suggestions to return.
     *
     * @return \DigipolisGent\Geopunt\Geolocation\Value\Suggestions
     *   Collection of suggestion values.
     */
    public function suggestions(string $query, int $amount): Suggestions;
}
