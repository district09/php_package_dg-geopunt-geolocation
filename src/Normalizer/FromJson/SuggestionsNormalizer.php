<?php

declare(strict_types=1);

namespace DigipolisGent\Geopunt\Geolocation\Normalizer\FromJson;

use DigipolisGent\Geopunt\Geolocation\Value\Suggestion;
use DigipolisGent\Geopunt\Geolocation\Value\Suggestions;

/**
 * Normalizes JSON data into a Suggestions collection.
 */
final class SuggestionsNormalizer
{
    /**
     * Normalize the json data.
     *
     * @param object $jsonData
     *
     * @return \DigipolisGent\Geopunt\Geolocation\Value\Suggestions
     */
    public function normalize(object $jsonData): Suggestions
    {
        $values = [];
        foreach ($jsonData->SuggestionResult as $result) {
            $values[] = new Suggestion($result);
        }

        return new Suggestions(...$values);
    }
}
