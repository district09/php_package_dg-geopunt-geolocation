<?php

declare(strict_types=1);

namespace DigipolisGent\Tests\Geopunt\Geolocation\Response;

use DigipolisGent\Geopunt\Geolocation\Response\LocationResponse;
use DigipolisGent\Geopunt\Geolocation\Value\Locations;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DigipolisGent\Geopunt\Geolocation\Response\LocationResponse
 */
class LocationResponseTest extends TestCase
{
    /**
     * Response is created with Locations collection.
     *
     * @test
     */
    public function responseHasSuggestionsCollection(): void
    {
        $locations = new Locations();
        $response = new LocationResponse($locations);

        $this->assertSame($locations, $response->locations());
    }
}
