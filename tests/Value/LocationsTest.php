<?php

declare(strict_types=1);

namespace DigipolisGent\Tests\Geopunt\Geolocation\Value;

use DigipolisGent\Geopunt\Geolocation\Value\LocationInterface;
use DigipolisGent\Geopunt\Geolocation\Value\Locations;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DigipolisGent\Geopunt\Geolocation\Value\Locations
 */
class LocationsTest extends TestCase
{
    /**
     * Casting to string returns all suggestions separated by a newline.
     *
     * @test
     */
    public function castToStringReturnsAllLocationsSeparatedByNewLine(): void
    {
        $location1 = $this->prophesize(LocationInterface::class);
        $location1->__toString()->willReturn('Bellevue 1, 9000 Gent');
        $location2 = $this->prophesize(LocationInterface::class);
        $location2->__toString()->willReturn('Bellevue 2, 9000 Gent');

        $locations = new Locations(
            $location1->reveal(),
            $location2->reveal()
        );

        $this->assertEquals(
            "Bellevue 1, 9000 Gent\nBellevue 2, 9000 Gent",
            (string) $locations
        );
    }
}
