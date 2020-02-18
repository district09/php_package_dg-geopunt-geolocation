<?php

declare(strict_types=1);

namespace DigipolisGent\Geopunt\Geolocation\Uri;

/**
 * Uri to lookup suggestions based on given filters.
 */
class SuggestionUri extends AbstractUriWithQuery
{
    /**
     * @inheritDoc
     */
    protected function getPath(): string
    {
        return 'Suggestion';
    }
}
