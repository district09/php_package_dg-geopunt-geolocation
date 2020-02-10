<?php

declare(strict_types=1);

namespace DigipolisGent\Geopunt\Geolocation\Response;

use DigipolisGent\API\Client\Response\ResponseInterface;
use DigipolisGent\Geopunt\Geolocation\Value\Locations;

/**
 * Response containing the locations collection.
 */
final class LocationResponse implements ResponseInterface
{
    /**
     * Locations collection.
     *
     * @var \DigipolisGent\Geopunt\Geolocation\Value\Locations
     */
    private $locations;

    /**
     * Constructor.
     *
     * @param \DigipolisGent\Geopunt\Geolocation\Value\Locations $locations
     */
    public function __construct(Locations $locations)
    {
        $this->locations = $locations;
    }

    /**
     * Get the locations.
     *
     * @return \DigipolisGent\Geopunt\Geolocation\Value\Locations
     */
    public function locations(): Locations
    {
        return $this->locations;
    }
}
