<?php

declare(strict_types=1);

namespace DigipolisGent\Tests\Geopunt\Geolocation\Request;

use DigipolisGent\Geopunt\Geolocation\Filter\Filters;
use DigipolisGent\Geopunt\Geolocation\Filter\NumberOfItemsFilter;
use DigipolisGent\Geopunt\Geolocation\Filter\SearchStringFilter;
use DigipolisGent\Geopunt\Geolocation\Request\LocationRequest;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DigipolisGent\Geopunt\Geolocation\Request\LocationRequest
 */
class LocationRequestTest extends TestCase
{
    /**
     * The URI is set.
     *
     * @test
     */
    public function requestUriIsSet(): void
    {
        $filters = new Filters(
            new SearchStringFilter('foobar'),
            new NumberOfItemsFilter(5)
        );

        $request = new LocationRequest($filters);

        $this->assertEquals('Location?q=foobar&c=5', $request->getRequestTarget());
    }
}
