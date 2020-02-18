<?php

declare(strict_types=1);

namespace DigipolisGent\Tests\Geopunt\Geolocation\Value\Position;

use DigipolisGent\Geopunt\Geolocation\Value\Position\Lambert72Point;
use DigipolisGent\Geopunt\Geolocation\Value\Position\Position;
use DigipolisGent\Geopunt\Geolocation\Value\Position\Wgs84Point;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DigipolisGent\Geopunt\Geolocation\Value\Position\Position
 */
class PositionTest extends TestCase
{
    /**
     * Position can be created from WGS84 and Lambert72 points.
     *
     * @test
     */
    public function canBeCreatedFromPoints(): void
    {
        $wgs84 = new Wgs84Point(2.5, 49.5);
        $lambert72 = new Lambert72Point(14637.25, 22608.21);

        $position = new Position($wgs84, $lambert72);

        $this->assertSame($wgs84, $position->wgs84());
        $this->assertSame($lambert72, $position->lambert72());
    }

    /**
     * Values are the same if they share the same parameters.
     *
     * @param \DigipolisGent\Geopunt\Geolocation\Value\Position\Position $value
     *   The value to compare another object with.
     * @param \DigipolisGent\Geopunt\Geolocation\Value\Position\Position $otherValue
     *   The other object to compare.
     * @param bool $shouldBeTheSame
     *   Should both objects be identified as the same.
     *
     * @dataProvider sameValueProvider
     *
     * @test
     */
    public function sameValueIfSameTypeAndParameters(
        Position $value,
        Position $otherValue,
        bool $shouldBeTheSame
    ) {
        $this->assertEquals(
            $shouldBeTheSame,
            $value->sameValueAs($otherValue)
        );
    }

    /**
     * Data provider to test the same value method.
     *
     * @return array
     *   Each record in the array contains:
     *   - Position : The value to compare against.
     *   - Position : The value to compare with.
     *   - bool : Should both values be seen as the same.
     */
    public function sameValueProvider(): array
    {
        $wgs84 = new Wgs84Point(2.5, 49.5);
        $otherWgs84 = new Wgs84Point(6.4, 51.51);

        $lambert72 = new Lambert72Point(14637.25, 22608.21);
        $otherLambert72 = new Lambert72Point(291015.29, 246424.28);

        return [
            'Not the same if WGS84 point is different' => [
                new Position($wgs84, $lambert72),
                new Position($otherWgs84, $lambert72),
                false,
            ],
            'Not the same if Lambert72 points is different' => [
                new Position($wgs84, $lambert72),
                new Position($wgs84, $otherLambert72),
                false,
            ],
            'The same if WGS84 and Lambert72 points are the same' => [
                new Position($wgs84, $lambert72),
                new Position($wgs84, $lambert72),
                true,
            ],
        ];
    }

    /**
     * String contains the string version of the WGS84 point.
     *
     * @test
     */
    public function castToStringContainsOnlyWgs84(): void
    {
        $position = new Position(
            new Wgs84Point(1, 2),
            new Lambert72Point(3, 4)
        );

        $this->assertSame('2 1', (string) $position);
    }
}
