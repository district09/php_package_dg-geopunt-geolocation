<?php

declare(strict_types=1);

namespace DigipolisGent\Geopunt\Geolocation;

use DigipolisGent\API\Service\ServiceAbstract;
use DigipolisGent\Geopunt\Geolocation\Request\SuggestionRequest;
use DigipolisGent\Geopunt\Geolocation\Value\Lookup;
use DigipolisGent\Geopunt\Geolocation\Value\Suggestions;

/**
 * API wrapper to access the geolocation service methods.
 */
final class Geolocation extends ServiceAbstract implements GeolocationInterface
{
    /**
     * @inheritDoc
     */
    public function suggestions(string $query, int $amount): Suggestions
    {
        $lookup = new Lookup($query, $amount);
        $request = new SuggestionRequest($lookup);

        return $this->client()->send($request)->suggestions();
    }
}
