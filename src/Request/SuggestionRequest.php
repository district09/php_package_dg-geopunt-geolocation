<?php

declare(strict_types=1);

namespace DigipolisGent\Geopunt\Geolocation\Request;

use DigipolisGent\Geopunt\Geolocation\Uri\SuggestionUri;
use DigipolisGent\Geopunt\Geolocation\Value\Lookup;

/**
 * Request to get suggestions based on given lookup.
 */
final class SuggestionRequest extends AbstractJsonRequest
{
    /**
     * Create a new address detail request.
     *
     * @param \DigipolisGent\Geopunt\Geolocation\Value\Lookup $lookup
     */
    public function __construct(Lookup $lookup)
    {
        parent::__construct(
            new SuggestionUri($lookup)
        );
    }
}
