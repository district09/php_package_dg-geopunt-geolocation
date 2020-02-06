<?php

declare(strict_types=1);

namespace DigipolisGent\Geopunt\Geolocation\Value;

use DigipolisGent\Value\CollectionAbstract;

/**
 * A collection of suggestion values.
 */
final class Suggestions extends CollectionAbstract
{

    /**
     * Create the collection from suggestion objects.
     *
     * @param \DigipolisGent\Geopunt\Geolocation\Value\Suggestion ...$suggestions
     */
    public function __construct(Suggestion ...$suggestions)
    {
        $this->values = $suggestions;
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return implode(';', $this->values);
    }
}
