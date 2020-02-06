<?php

declare(strict_types=1);

namespace DigipolisGent\Geopunt\Geolocation\Response;

use DigipolisGent\API\Client\Response\ResponseInterface;
use DigipolisGent\Geopunt\Geolocation\Value\Suggestions;

/**
 * Response containing the address detail value.
 */
final class SuggestionResponse implements ResponseInterface
{
    /**
     * Suggestions collection.
     *
     * @var \DigipolisGent\Geopunt\Geolocation\Value\Suggestions
     */
    private $suggestions;

    /**
     * Constructor.
     *
     * @param \DigipolisGent\Geopunt\Geolocation\Value\Suggestions $suggestions
     */
    public function __construct(Suggestions $suggestions)
    {
        $this->suggestions = $suggestions;
    }

    /**
     * Get the suggestions.
     *
     * @return \DigipolisGent\Geopunt\Geolocation\Value\Suggestions
     */
    public function suggestions(): Suggestions
    {
        return $this->suggestions;
    }
}
