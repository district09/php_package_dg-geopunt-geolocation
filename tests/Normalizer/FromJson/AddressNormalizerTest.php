<?php

declare(strict_types=1);

namespace DigipolisGent\Tests\Geopunt\Geolocation\Normalizer\FromJson;

use DigipolisGent\Geopunt\Geolocation\Normalizer\FromJson\AddressNormalizer;
use DigipolisGent\Geopunt\Geolocation\Value\Address;
use DigipolisGent\Geopunt\Geolocation\Value\Municipality;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DigipolisGent\Geopunt\Geolocation\Normalizer\FromJson\AddressNormalizer
 */
class AddressNormalizerTest extends TestCase
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
    "Housenumber": "1"
}
EOT;

    /**
     * Json data to test where values are empty.
     *
     * @var string
     */
    private $jsonWithoutHouseNumber = <<<EOT
{
    "Municipality": null,
    "Zipcode": null,
    "Thoroughfarename": null,
    "Housenumber": null
}
EOT;

    /**
     * Json data is normalized into a Position value.
     *
     * @test
     */
    public function jsonDataIsNormalized(): void
    {
        $expected = new Address(
            'Trambergstraat',
            '1',
            new Municipality('3120', 'Zonhoven')
        );

        $normalizer = new AddressNormalizer();
        $jsonData = json_decode($this->json);

        $this->assertEquals(
            $expected,
            $normalizer->normalize($jsonData)
        );
    }

    /**
     * Json data without house number can be normalized.
     *
     * @test
     */
    public function jsonDataWithoutHouseNumberCanBeNormalized(): void
    {
        $expected = new Address(
            '',
            '',
            new Municipality('', '')
        );

        $normalizer = new AddressNormalizer();
        $jsonData = json_decode($this->jsonWithoutHouseNumber);

        $this->assertEquals(
            $expected,
            $normalizer->normalize($jsonData)
        );
    }
}
