<?php

declare(strict_types=1);

namespace DigipolisGent\Tests\Geopunt\Geolocation\Value;

use DigipolisGent\Geopunt\Geolocation\Value\Municipality;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DigipolisGent\Geopunt\Geolocation\Value\Municipality
 */
class MunicipalityTest extends TestCase
{

    /**
     * Municipality can be created from postal code and name.
     *
     * @test
     */
    public function canBeCreatedFromPostalCodeAndName(): void
    {
        $municipality = new Municipality('9000', 'Gent');

        $this->assertEquals('9000', $municipality->postalCode());
        $this->assertEquals('Gent', $municipality->name());
    }

    /**
     * Values are the same if they share the same parameters.
     *
     * @param \DigipolisGent\Geopunt\Geolocation\Value\Municipality $value
     *   The value to compare another object with.
     * @param \DigipolisGent\Geopunt\Geolocation\Value\Municipality $otherValue
     *   The other object to compare.
     * @param bool $shouldBeTheSame
     *   Should both objects be identified as the same.
     *
     * @dataProvider sameValueProvider
     *
     * @test
     */
    public function sameValueIfSameTypeAndParameters(
        Municipality $value,
        Municipality $otherValue,
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
     *   - Municipality : The value to compare against.
     *   - Municipality : The value to compare with.
     *   - bool : Should both values be seen as the same.
     */
    public function sameValueProvider(): array
    {
        return [
            'Not the same if postal code is different' => [
                new Municipality('9000', 'Gent'),
                new Municipality('9001', 'Gent'),
                false,
            ],
            'Not the same if name is different' => [
                new Municipality('9000', 'Gent'),
                new Municipality('9000', 'Ledeberg'),
                false,
            ],
            'The same if postal code and name are the same' => [
                new Municipality('9000', 'Gent'),
                new Municipality('9000', 'Gent'),
                true,
            ],
        ];
    }

    /**
     * String contains postal code and name.
     *
     * @test
     */
    public function castToStringContainsPostalCodeAndName(): void
    {
        $municipality = new Municipality('9000', 'Gent');
        $this->assertSame('9000 Gent', (string) $municipality);
    }
}
