<?php

declare(strict_types=1);

namespace DigipolisGent\Tests\Geopunt\Geolocation\Value\Position;

use DigipolisGent\Geopunt\Geolocation\Value\Position\Lambert72Point;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DigipolisGent\Geopunt\Geolocation\Value\Position\AbstractPoint
 * @covers \DigipolisGent\Geopunt\Geolocation\Value\Position\Lambert72Point
 */
class Lambert72PointTest extends TestCase
{
    /**
     * Point can be created from x and y position.
     *
     * @test
     */
    public function pointCanBeCreatedFromXAndYPosition(): void
    {
        $point = new Lambert72Point(97000.00, 171000.00);
        $this->assertSame(97000.00, $point->xPosition());
        $this->assertSame(171000.00, $point->yPosition());
    }

    /**
     * Values are the same if they share the same parameters.
     *
     * @param \DigipolisGent\Geopunt\Geolocation\Value\Position\Lambert72Point $value
     *   The value to compare another object with.
     * @param \DigipolisGent\Geopunt\Geolocation\Value\Position\Lambert72Point $otherValue
     *   The other object to compare.
     * @param bool $shouldBeTheSame
     *   Should both objects be identified as the same.
     *
     * @dataProvider sameValueProvider
     *
     * @test
     */
    public function sameValueIfSameTypeAndParameters(
        Lambert72Point $value,
        Lambert72Point $otherValue,
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
     *   - Lambert72Point : The value to compare against.
     *   - Lambert72Point : The value to compare with.
     *   - bool : Should both values be seen as the same.
     */
    public function sameValueProvider(): array
    {
        return [
            'Not the same if x value is different' => [
                new Lambert72Point(12.3, 45.6),
                new Lambert72Point(21.3, 45.6),
                false,
            ],
            'Not the same if y value is different' => [
                new Lambert72Point(12.3, 45.6),
                new Lambert72Point(12.3, 54.6),
                false,
            ],
            'The same if x and y values are the same' => [
                new Lambert72Point(12.3, 45.6),
                new Lambert72Point(12.3, 45.6),
                true,
            ],
        ];
    }

    /**
     * Cast to string results in x,y.
     *
     * @test
     */
    public function castToStringReturnsXYSeparatedByComma(): void
    {
        $point = new Lambert72Point(10.99, 20.01);
        $this->assertSame('10.99 20.01', (string) $point);
    }
}
