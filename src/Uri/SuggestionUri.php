<?php

declare(strict_types=1);

namespace DigipolisGent\Geopunt\Geolocation\Uri;

use DigipolisGent\API\Client\Uri\UriInterface;
use DigipolisGent\Geopunt\Geolocation\Value\Lookup;

/**
 * Uri where the addresses (adressen) methods are located.
 */
class SuggestionUri implements UriInterface
{
    /**
     * The lookup value to create the URI for.
     *
     * @var \DigipolisGent\Geopunt\Geolocation\Value\Lookup
     */
    private $lookup;

    /**
     * Create new URI from lookup.
     *
     * @param \DigipolisGent\Geopunt\Geolocation\Value\Lookup $lookup
     */
    public function __construct(Lookup $lookup)
    {
        $this->lookup = $lookup;
    }

    /**
     * @inheritDoc
     */
    public function getUri(): string
    {
        return sprintf(
            'Suggestion?q=%s&c=%d',
            $this->lookup->query(),
            $this->lookup->amount()
        );
    }
}
