<?php

declare(strict_types=1);

namespace DigipolisGent\Tests\Geopunt\Geolocation\Value;

use DigipolisGent\Geopunt\Geolocation\Value\LocationId;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DigipolisGent\Geopunt\Geolocation\Value\LocationId
 */
class LocationIdTest extends TestCase
{

    /**
     * Exception is thrown when value is not greater than 0.
     *
     * @param int $value
     *   The object id value to test.
     * @param bool $expectException
     *   Should the value trigger an exception.
     *
     * @dataProvider locationIdValueProvider
     *
     * @test
     */
    public function locationIdValueShouldBeGreaterThanZero(int $value, bool $expectException): void
    {
        if ($expectException) {
            $this->expectException(InvalidArgumentException::class);
        }

        new LocationId($value);
        $this->assertFalse($expectException, 'Value dit not trigger an exception.');
    }

    /**
     * Data provider to test the value assertion.
     *
     * @return array
     *   Each record in the array contains:
     *   - int : The value to test.
     *   - bool : Should the code trigger an exception.
     */
    public function locationIdValueProvider(): array
    {
        return [
            [-1, true],
            [0, true],
            [1, false],
        ];
    }

    /**
     * Values are the same if they share the same object type and parameters.
     *
     * @param \DigipolisGent\Geopunt\Geolocation\Value\LocationId $value
     *   The value to compare another object with.
     * @param \DigipolisGent\Geopunt\Geolocation\Value\LocationId $otherValue
     *   The other object to compare.
     * @param bool $shouldBeTheSame
     *   Should both objects be identified as the same.
     *
     * @dataProvider sameValueProvider
     *
     * @test
     */
    public function sameValueIfSameTypeAndParameters(
        LocationId $value,
        LocationId $otherValue,
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
     *   - LocationId : The value to compare against.
     *   - LocationId : The value to compare with.
     *   - bool : Should both values be seen as the same.
     */
    public function sameValueProvider(): array
    {
        return [
            'Not the same if value is different' => [
                new LocationId(1),
                new LocationId(2),
                false,
            ],
            'The same if values are the same' => [
                new LocationId(3),
                new LocationId(3),
                true,
            ],
        ];
    }

    /**
     * Id is returned as string.
     *
     * @test
     */
    public function castToStringReturnsId(): void
    {
        $locationId = new LocationId(123);
        $this->assertSame('123', (string) $locationId);
    }
}
