<?php

declare(strict_types=1);

namespace DigipolisGent\Tests\Geopunt\Geolocation\Normalizer\FromJson;

use DigipolisGent\Geopunt\Geolocation\Normalizer\FromJson\LocationNormalizer;
use DigipolisGent\Geopunt\Geolocation\Value\Address;
use DigipolisGent\Geopunt\Geolocation\Value\Location;
use DigipolisGent\Geopunt\Geolocation\Value\LocationId;
use DigipolisGent\Geopunt\Geolocation\Value\Municipality;
use DigipolisGent\Geopunt\Geolocation\Value\Position\BoundingBox;
use DigipolisGent\Geopunt\Geolocation\Value\Position\Lambert72Point;
use DigipolisGent\Geopunt\Geolocation\Value\Position\Position;
use DigipolisGent\Geopunt\Geolocation\Value\Position\Wgs84Point;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DigipolisGent\Geopunt\Geolocation\Normalizer\FromJson\LocationNormalizer
 */
class LocationNormalizerTest extends TestCase
{
    /**
     * Json data to test with.
     *
     * @var string
     */
    private $json = <<<EOT
{
    "Municipality": "Zonhoven",
    "Zipcode": "3120",
    "Thoroughfarename": "Trambergstraat",
    "Housenumber": "1",
    "ID": 1234,
    "FormattedAddress": "Trambergstraat 1, 3120 Zonhoven",
    "Location": {
        "Lat_WGS84": 50.991974017459327,
        "Lon_WGS84": 5.3517046535166282,
        "X_Lambert72": 219009.14,
        "Y_Lambert72": 187317.72
    },
    "LocationType": "crab_huisnummer_afgeleidVanGebouw",
    "BoundingBox": {
        "LowerLeft": {
            "Lat_WGS84": 50.991974017459327,
            "Lon_WGS84": 5.3517046535166282,
            "X_Lambert72": 219009.14,
            "Y_Lambert72": 187317.72
        },
        "UpperRight": {
            "Lat_WGS84": 50.991974017459327,
            "Lon_WGS84": 5.3517046535166282,
            "X_Lambert72": 219009.14,
            "Y_Lambert72": 187317.72
        }
    }
}
EOT;

    /**
     * Json data is normalized into a Position value.
     *
     * @test
     */
    public function jsonDataIsNormalized(): void
    {
        $expected = new Location(
            new LocationId(1234),
            'crab_huisnummer_afgeleidVanGebouw',
            new Address(
                'Trambergstraat',
                '1',
                new Municipality('3120', 'Zonhoven')
            ),
            new Position(
                new Wgs84Point(5.3517046535166282, 50.991974017459327),
                new Lambert72Point(219009.14, 187317.72)
            ),
            new BoundingBox(
                new Position(
                    new Wgs84Point(5.3517046535166282, 50.991974017459327),
                    new Lambert72Point(219009.14, 187317.72)
                ),
                new Position(
                    new Wgs84Point(5.3517046535166282, 50.991974017459327),
                    new Lambert72Point(219009.14, 187317.72)
                )
            )
        );

        $normalizer = new LocationNormalizer();
        $jsonData = json_decode($this->json);

        $this->assertEquals(
            $expected,
            $normalizer->normalize($jsonData)
        );
    }
}
