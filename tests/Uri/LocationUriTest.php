<?php

declare(strict_types=1);

namespace DigipolisGent\Tests\Geopunt\Geolocation\Uri;

use DigipolisGent\Geopunt\Geolocation\Uri\LocationUri;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DigipolisGent\Geopunt\Geolocation\Uri\LocationUri
 */
class LocationUriTest extends TestCase
{

    /**
     * URI without filters.
     *
     * @test
     */
    public function uriWithoutFilters(): void
    {
        $uri = new LocationUri();
        $this->assertEquals('Location', $uri->getUri());
    }

}
