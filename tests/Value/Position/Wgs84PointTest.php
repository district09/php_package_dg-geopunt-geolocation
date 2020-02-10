<?php

declare(strict_types=1);

namespace DigipolisGent\Tests\Geopunt\Geolocation\Value\Position;

use DigipolisGent\Geopunt\Geolocation\Value\Position\Wgs84Point;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DigipolisGent\Geopunt\Geolocation\Value\Position\Wgs84Point
 */
class Wgs84PointTest extends TestCase
{
    /**
     * Point can be created from x and y position.
     *
     * @param float $xPosition
     * @param float $yPosition
     * @param bool $shouldTriggerException
     *
     * @dataProvider pointProvider
     *
     * @test
     */
    public function pointCanBeCreatedFromXAndYPosition(
        float $xPosition,
        float $yPosition,
        bool $shouldTriggerException
    ): void {
        if ($shouldTriggerException) {
            $this->expectException(InvalidArgumentException::class);
        }

        $point = new Wgs84Point($xPosition, $yPosition);
        $this->assertSame($xPosition, $point->xPosition());
        $this->assertSame($yPosition, $point->yPosition());
    }

    /**
     * Data provider to test creating the point value.
     *
     * @return array
     *   Rows containing:
     *   - float : x-position value.
     *   - float : y-position value.
     *   - bool : the given values should trigger an exception.
     */
    public function pointProvider(): array
    {
        return [
            'Exception when X is less than -180' => [
                -180.000001,
                0,
                true,
            ],
            'Exception when X is greater than 180' => [
                180.000001,
                0,
                true,
            ],
            'Exception when Y is less than -90' => [
                0,
                -90.000001,
                true,
            ],
            'Exception when Y is greater than 90' => [
                0,
                90.000001,
                true,
            ],
            'Value is created when X and Y are within the minimum boundaries' => [
                -180,
                -90,
                false,
            ],
            'Value is created when X and Y are within the maximum boundaries' => [
                180,
                90,
                false,
            ],
        ];
    }

    /**
     * String has proper properties order.
     *
     * The order should be [latitude (y)] [longitude (x)].
     *
     * @test
     */
    public function toStringContainsLatLongInProperOrder(): void
    {
        $point = new Wgs84Point(11.101, 12.201);
        $this->assertSame('12.201 11.101', (string) $point);
    }
}
