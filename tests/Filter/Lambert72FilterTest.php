<?php

declare(strict_types=1);

namespace DigipolisGent\Tests\Geopunt\Geolocation\Filter;

use DigipolisGent\Geopunt\Geolocation\Filter\Lambert72Filter;
use DigipolisGent\Geopunt\Geolocation\Value\Position\Lambert72Point;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DigipolisGent\Geopunt\Geolocation\Filter\Lambert72Filter
 */
class Lambert72FilterTest extends TestCase
{
    /**
     * Filter can be created from Lambert72 Point value.
     *
     * @test
     */
    public function canBeCreatedFromLambert72PointValue(): void
    {
        $point = new Lambert72Point(10, 20);
        $filter = Lambert72Filter::fromLambert72Point($point);

        $this->assertSame('10,20', $filter->value());
    }


    /**
     * Filter can be created from latitude/longitude values.
     *
     * @test
     */
    public function canBeCreatedFromXYCoordinates(): void
    {
        $filter = Lambert72Filter::fromXY(10, 20);
        $this->assertSame('10,20', $filter->value());
    }

    /**
     * Filter has proper argument name.
     *
     * @test
     */
    public function hasProperArgumentName(): void
    {
        $filter = new Lambert72Filter('10,20');

        $this->assertEquals('xy', $filter->name());
    }
}
