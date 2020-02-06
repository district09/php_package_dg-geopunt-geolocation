<?php

declare(strict_types=1);

namespace DigipolisGent\Tests\Geopunt\Geolocation\Normalizer\FromJson;

use DigipolisGent\Geopunt\Geolocation\Normalizer\FromJson\SuggestionsNormalizer;
use DigipolisGent\Geopunt\Geolocation\Value\Suggestion;
use DigipolisGent\Geopunt\Geolocation\Value\Suggestions;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DigipolisGent\Geopunt\Geolocation\Normalizer\FromJson\SuggestionsNormalizer
 */
class SuggestionsNormalizerTest extends TestCase
{
    /**
     * Json data to test with.
     *
     * @var string
     */
    private $json = <<<EOT
{
    "SuggestionResult": [
        "Bellvue 1, 9000 Gent",
        "Bellvue 11, 9000 Gent",
        "Bellvue 12, 9000 Gent",
        "Bellvue 13, 9000 Gent"
    ]
}
EOT;

    /**
     * Json data is normalized into an Suggestions collection.
     *
     * @test
     */
    public function jsonDataIsNormalized(): void
    {
        $expected = new Suggestions(
            new Suggestion('Bellvue 1, 9000 Gent'),
            new Suggestion('Bellvue 11, 9000 Gent'),
            new Suggestion('Bellvue 12, 9000 Gent'),
            new Suggestion('Bellvue 13, 9000 Gent')
        );

        $normalizer = new SuggestionsNormalizer();
        $jsonData = json_decode($this->json);

        $this->assertEquals(
            $expected,
            $normalizer->normalize($jsonData)
        );
    }

    /**
     * Empty result sets can be normalized.
     *
     * @test
     */
    public function emptyJsonDataCanBeNormalized(): void
    {
        $expected = new Suggestions();

        $normalizer = new SuggestionsNormalizer();
        $jsonData = json_decode('{"SuggestionResult": []}');

        $this->assertEquals(
            $expected,
            $normalizer->normalize($jsonData)
        );
    }
}
