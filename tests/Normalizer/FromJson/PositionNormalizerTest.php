<?php

declare(strict_types=1);

namespace DigipolisGent\Tests\Geopunt\Geolocation\Normalizer\FromJson;

use DigipolisGent\Geopunt\Geolocation\Normalizer\FromJson\PositionNormalizer;
use DigipolisGent\Geopunt\Geolocation\Value\Position\Lambert72Point;
use DigipolisGent\Geopunt\Geolocation\Value\Position\Position;
use DigipolisGent\Geopunt\Geolocation\Value\Position\Wgs84Point;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DigipolisGent\Geopunt\Geolocation\Normalizer\FromJson\PositionNormalizer
 */
class PositionNormalizerTest extends TestCase
{
    /**
     * Json data to test with.
     *
     * @var string
     */
    private $json = <<<EOT
{
    "Lat_WGS84": 50.991974017459327,
    "Lon_WGS84": 5.3517046535166282,
    "X_Lambert72": 219009.14,
    "Y_Lambert72": 187317.72
}
EOT;

    /**
     * Json data is normalized into a Position value.
     *
     * @test
     */
    public function jsonDataIsNormalized(): void
    {
        $expected = new Position(
            new Wgs84Point(5.3517046535166282, 50.991974017459327),
            new Lambert72Point(219009.14, 187317.72)
        );

        $normalizer = new PositionNormalizer();
        $jsonData = json_decode($this->json);

        $this->assertEquals(
            $expected,
            $normalizer->normalize($jsonData)
        );
    }
}
