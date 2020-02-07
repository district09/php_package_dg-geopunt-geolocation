<?php

declare(strict_types=1);

namespace DigipolisGent\Tests\Geopunt\Geolocation\Filter;

use DigipolisGent\Geopunt\Geolocation\Filter\Wgs84Filter;
use DigipolisGent\Geopunt\Geolocation\Value\Position\Wgs84Point;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DigipolisGent\Geopunt\Geolocation\Filter\Wgs84Filter
 */
class Wgs84FilterTest extends TestCase
{
    /**
     * Filter can be created from Wgs84Point value.
     *
     * @test
     */
    public function canBeCreatedFromWgs84Point(): void
    {
        $point = new Wgs84Point(20, 10);
        $filter = Wgs84Filter::fromWgs84Point($point);

        $this->assertSame('10,20', $filter->value());
    }

    /**
     * Filter can be created from latitude/longitude values.
     *
     * @test
     */
    public function canBeCreatedFromLatitudeLongitude(): void
    {
        $filter = Wgs84Filter::fromLatitudeLongitude(10, 20);
        $this->assertSame('10,20', $filter->value());
    }

    /**
     * Filter has proper argument name.
     *
     * @test
     */
    public function hasProperArgumentName(): void
    {
        $filter = new Wgs84Filter('10,20');

        $this->assertEquals('latlon', $filter->name());
    }
}
