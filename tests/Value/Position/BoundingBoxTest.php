<?php

declare(strict_types=1);

namespace DigipolisGent\Tests\Geopunt\Geolocation\Value\Position;

use DigipolisGent\Geopunt\Geolocation\Value\Position\BoundingBox;
use DigipolisGent\Geopunt\Geolocation\Value\Position\Lambert72Point;
use DigipolisGent\Geopunt\Geolocation\Value\Position\Position;
use DigipolisGent\Geopunt\Geolocation\Value\Position\Wgs84Point;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DigipolisGent\Geopunt\Geolocation\Value\Position\BoundingBox
 */
class BoundingBoxTest extends TestCase
{
    /**
     * Position can be created from lower left and upper right position.
     *
     * @test
     */
    public function canBeCreatedFromLowerLeftAndUpperRightPosition(): void
    {
        $lowerLeft = new Position(
            new Wgs84Point(10, 10),
            new Lambert72Point(10, 10)
        );
        $upperRight = new Position(
            new Wgs84Point(20, 20),
            new Lambert72Point(20, 20)
        );

        $boundingBox = new BoundingBox($lowerLeft, $upperRight);

        $this->assertSame($lowerLeft, $boundingBox->lowerLeft());
        $this->assertSame($upperRight, $boundingBox->upperRight());
    }

    /**
     * Values are the same if they share the same parameters.
     *
     * @param \DigipolisGent\Geopunt\Geolocation\Value\Position\BoundingBox $value
     *   The value to compare another object with.
     * @param \DigipolisGent\Geopunt\Geolocation\Value\Position\BoundingBox $otherValue
     *   The other object to compare.
     * @param bool $shouldBeTheSame
     *   Should both objects be identified as the same.
     *
     * @dataProvider sameValueProvider
     *
     * @test
     */
    public function sameValueIfSameTypeAndParameters(
        BoundingBox $value,
        BoundingBox $otherValue,
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
     *   - BoundingBox : The value to compare against.
     *   - BoundingBox : The value to compare with.
     *   - bool : Should both values be seen as the same.
     */
    public function sameValueProvider(): array
    {
        $lowerLeft = new Position(
            new Wgs84Point(10, 10),
            new Lambert72Point(10, 10)
        );
        $otherLowerLeft = new Position(
            new Wgs84Point(12, 12),
            new Lambert72Point(12, 12)
        );
        $upperRight = new Position(
            new Wgs84Point(20, 20),
            new Lambert72Point(20, 20)
        );
        $otherUpperRight = new Position(
            new Wgs84Point(24, 24),
            new Lambert72Point(24, 24)
        );

        return [
            'Not the same if lower left is different' => [
                new BoundingBox($lowerLeft, $upperRight),
                new BoundingBox($otherLowerLeft, $upperRight),
                false,
            ],
            'Not the same if upper right is different' => [
                new BoundingBox($lowerLeft, $upperRight),
                new BoundingBox($lowerLeft, $otherUpperRight),
                false,
            ],
            'The same if lower left and upper right are the same' => [
                new BoundingBox($lowerLeft, $upperRight),
                new BoundingBox($lowerLeft, $upperRight),
                true,
            ],
        ];
    }

    /**
     * String contains [lower left WGS84];[upper right WGS84].
     *
     * @test
     */
    public function castToStringContainsOnlyWgs84(): void
    {
        $lowerLeft = new Position(
            new Wgs84Point(11, 12),
            new Lambert72Point(101, 102)
        );
        $upperRight = new Position(
            new Wgs84Point(21, 22),
            new Lambert72Point(201, 202)
        );

        $boundingBox = new BoundingBox($lowerLeft, $upperRight);

        $this->assertSame("12 11\n22 21", (string) $boundingBox);
    }
}
