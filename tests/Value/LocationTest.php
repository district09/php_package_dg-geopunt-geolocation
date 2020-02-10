<?php

declare(strict_types=1);

namespace DigipolisGent\Tests\Geopunt\Geolocation\Value;

use DigipolisGent\Geopunt\Geolocation\Value\Address;
use DigipolisGent\Geopunt\Geolocation\Value\Location;
use DigipolisGent\Geopunt\Geolocation\Value\LocationId;
use DigipolisGent\Geopunt\Geolocation\Value\Municipality;
use DigipolisGent\Geopunt\Geolocation\Value\Position\BoundingBox;
use DigipolisGent\Geopunt\Geolocation\Value\Position\Position;
use DigipolisGent\Geopunt\Geolocation\Value\Position\Lambert72Point;
use DigipolisGent\Geopunt\Geolocation\Value\Position\Wgs84Point;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DigipolisGent\Geopunt\Geolocation\Value\Location
 */
class LocationTest extends TestCase
{
    /**
     * Location can be created from its details.
     *
     * @test
     */
    public function canBeCreatedFromDetails(): void
    {
        $municipality = new Municipality('9000', 'Gent');
        $address = new Address('Bellevue', '1', $municipality);

        $wgs84 = new Wgs84Point(10, 10);
        $lambert72 = new Lambert72Point(10, 10);
        $position = new Position($wgs84, $lambert72);
        $boundingBox = new BoundingBox($position, $position);

        $locationId = new LocationId(12345);
        $location = new Location(
            $locationId,
            'location_type',
            $address,
            $position,
            $boundingBox
        );

        $this->assertSame($locationId, $location->locationId());
        $this->assertSame('location_type', $location->type());
        $this->assertSame($address, $location->address());
        $this->assertSame($position, $location->position());
        $this->assertSame($boundingBox, $location->boundingBox());
    }

    /**
     * Values are the same if they share the same parameters.
     *
     * @param \DigipolisGent\Geopunt\Geolocation\Value\Location $value
     *   The value to compare another object with.
     * @param \DigipolisGent\Geopunt\Geolocation\Value\Location $otherValue
     *   The other object to compare.
     * @param bool $shouldBeTheSame
     *   Should both objects be identified as the same.
     *
     * @dataProvider sameValueProvider
     *
     * @test
     */
    public function sameValueIfSameTypeAndParameters(
        Location $value,
        Location $otherValue,
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
     *   - Location : The value to compare against.
     *   - Location : The value to compare with.
     *   - bool : Should both values be seen as the same.
     */
    public function sameValueProvider(): array
    {
        $locationId = new LocationId(123);
        $otherLocationId = new LocationId(456);
        $type = 'location_type';
        $otherType = 'other_location_type';

        $municipality = new Municipality('9000', 'Gent');
        $address = new Address('Bellevue', '1', $municipality);
        $otherAddress = new Address('Veldstraat', '1', $municipality);

        $position = new Position(
            new Wgs84Point(10, 10),
            new Lambert72Point(10, 10)
        );
        $otherPosition = new Position(
            new Wgs84Point(20, 20),
            new Lambert72Point(20, 20)
        );

        $boundingBox = new BoundingBox($position, $position);
        $otherBoundingBox = new BoundingBox($otherPosition, $otherPosition);

        $location = new Location($locationId, $type, $address, $position, $boundingBox);

        return [
            'Not the same if ID is different' => [
                $location,
                new Location(
                    $otherLocationId,
                    $type,
                    $address,
                    $position,
                    $boundingBox
                ),
                false,
            ],
            'Not the same if type is different' => [
                $location,
                new Location(
                    $locationId,
                    $otherType,
                    $address,
                    $position,
                    $boundingBox
                ),
                false,
            ],
            'Not the same if address is different' => [
                $location,
                new Location(
                    $locationId,
                    $type,
                    $otherAddress,
                    $position,
                    $boundingBox
                ),
                false,
            ],
            'Not the same if position is different' => [
                $location,
                new Location(
                    $locationId,
                    $type,
                    $address,
                    $otherPosition,
                    $boundingBox
                ),
                false,
            ],
            'Not the same if bounding box is different' => [
                $location,
                new Location(
                    $locationId,
                    $type,
                    $address,
                    $position,
                    $otherBoundingBox
                ),
                false,
            ],
            'The same if details are the same' => [
                $location,
                new Location(
                    $locationId,
                    $type,
                    $address,
                    $position,
                    $boundingBox
                ),
                true,
            ],
        ];
    }

    /**
     * Fromatted address is string version of the address.
     *
     * @test
     */
    public function formattedAddressIsStringFromAddress(): void
    {
        $municipality = new Municipality('9000', 'Gent');
        $address = new Address('Bellevue', '1', $municipality);

        $wgs84 = new Wgs84Point(10, 10);
        $lambert72 = new Lambert72Point(10, 10);
        $position = new Position($wgs84, $lambert72);
        $boundingBox = new BoundingBox($position, $position);

        $locationId = new LocationId(12345);
        $location = new Location(
            $locationId,
            'location_type',
            $address,
            $position,
            $boundingBox
        );

        $this->assertSame('Bellevue 1, 9000 Gent', $location->addressFormatted());
    }

    /**
     * String contains formatted address.
     *
     * @test
     */
    public function castToStringContainsPostalCodeAndName(): void
    {
        $municipality = new Municipality('9000', 'Gent');
        $address = new Address('Bellevue', '1', $municipality);

        $wgs84 = new Wgs84Point(10, 10);
        $lambert72 = new Lambert72Point(10, 10);
        $position = new Position($wgs84, $lambert72);
        $boundingBox = new BoundingBox($position, $position);

        $locationId = new LocationId(12345);
        $location = new Location(
            $locationId,
            'location_type',
            $address,
            $position,
            $boundingBox
        );

        $this->assertSame('Bellevue 1, 9000 Gent', (string) $location);
    }
}
