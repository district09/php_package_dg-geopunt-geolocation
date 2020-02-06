<?php

declare(strict_types=1);

namespace DigipolisGent\Geopunt\Geolocation;

use DigipolisGent\API\Client\ClientInterface;
use DigipolisGent\Geopunt\Geolocation\Handler\SuggestionHandler;

/**
 * Factory to get the geolocation service.
 */
final class GeolocationFactory
{
    /**
     * @param \DigipolisGent\API\Client\ClientInterface $client
     *
     * @return \DigipolisGent\Geopunt\Geolocation\GeolocationInterface
     */
    public static function create(ClientInterface $client): GeolocationInterface
    {
        $client->addHandler(new SuggestionHandler());

        return new Geolocation($client);
    }
}
