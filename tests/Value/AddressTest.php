<?php

declare(strict_types=1);

namespace DigipolisGent\Tests\Geopunt\Geolocation\Value;

use DigipolisGent\Geopunt\Geolocation\Value\Address;
use DigipolisGent\Geopunt\Geolocation\Value\Municipality;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DigipolisGent\Geopunt\Geolocation\Value\Address
 */
class AddressTest extends TestCase
{

    /**
     * Address can be created from street name, house number, and municipality.
     *
     * @test
     */
    public function canBeCreatedFromStreetNameHouseNumberMunicipality(): void
    {
        $municipality = new Municipality('9000', 'Gent');
        $address = new Address('Bellevue', '1', $municipality);

        $this->assertEquals('Bellevue', $address->streetName());
        $this->assertEquals('1', $address->houseNumber());
        $this->assertSame($municipality, $address->municipality());
        $this->assertEquals('9000', $address->postalCode());
        $this->assertEquals('Gent', $address->municipalityName());
    }

    /**
     * Values are the same if they share the same parameters.
     *
     * @param \DigipolisGent\Geopunt\Geolocation\Value\Address $value
     *   The value to compare another object with.
     * @param \DigipolisGent\Geopunt\Geolocation\Value\Address $otherValue
     *   The other object to compare.
     * @param bool $shouldBeTheSame
     *   Should both objects be identified as the same.
     *
     * @dataProvider sameValueProvider
     *
     * @test
     */
    public function sameValueIfSameTypeAndParameters(
        Address $value,
        Address $otherValue,
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
     *   - Address : The value to compare against.
     *   - Address : The value to compare with.
     *   - bool : Should both values be seen as the same.
     */
    public function sameValueProvider(): array
    {
        $municipality = new Municipality('9000', 'Gent');
        $otherMunicipality = new Municipality('8000', 'Brugge');

        return [
            'Not the same if street name is different' => [
                new Address('Bellevue', '1', $municipality),
                new Address('Veldstraat', '1', $municipality),
                false,
            ],
            'Not the same if house number is different' => [
                new Address('Bellevue', '1', $municipality),
                new Address('Bellevue', '2', $municipality),
                false,
            ],
            'Not the same if municipality is different' => [
                new Address('Bellevue', '1', $municipality),
                new Address('Bellevue', '1', $otherMunicipality),
                false,
            ],
            'The same if street name, house number, and municipality are the same' => [
                new Address('Bellevue', '1', $municipality),
                new Address('Bellevue', '1', $municipality),
                true,
            ],
        ];
    }

    /**
     * String is "[street name] [house number], [postal code] [municipality]".
     *
     * @test
     */
    public function castToStringContainsDetails(): void
    {
        $address = new Address(
            'Bellevue',
            '1',
            new Municipality('9000', 'Gent')
        );

        $this->assertSame('Bellevue 1, 9000 Gent', (string) $address);
    }
}
