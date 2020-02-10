<?php

declare(strict_types=1);

namespace DigipolisGent\Geopunt\Geolocation\Request;

use DigipolisGent\Geopunt\Geolocation\Filter\Filters;
use DigipolisGent\Geopunt\Geolocation\Uri\SuggestionUri;

/**
 * Request to get suggestions based on given filters.
 */
final class SuggestionRequest extends AbstractJsonRequest
{
    /**
     * Create a new suggestion request.
     *
     * @param \DigipolisGent\Geopunt\Geolocation\Filter\Filters $filters
     */
    public function __construct(Filters $filters)
    {
        parent::__construct(
            new SuggestionUri($filters)
        );
    }
}
