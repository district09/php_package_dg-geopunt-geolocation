<?php

declare(strict_types=1);

namespace DigipolisGent\Geopunt\Geolocation\Filter;

/**
 * Filter to search records by the given string.
 */
final class SearchStringFilter extends AbstractFilter
{
    /**
     * @inheritDoc
     */
    public function name(): string
    {
        return 'q';
    }
}
