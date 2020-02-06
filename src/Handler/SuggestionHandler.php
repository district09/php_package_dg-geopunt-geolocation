<?php

declare(strict_types=1);

namespace DigipolisGent\Geopunt\Geolocation\Handler;

use DigipolisGent\API\Client\Handler\HandlerInterface;
use DigipolisGent\API\Client\Response\ResponseInterface;
use DigipolisGent\Geopunt\Geolocation\Normalizer\FromJson\SuggestionsNormalizer;
use DigipolisGent\Geopunt\Geolocation\Request\SuggestionRequest;
use DigipolisGent\Geopunt\Geolocation\Response\SuggestionResponse;
use Psr\Http\Message as Psr;

/**
 * Handles the AddressDetail request.
 */
final class SuggestionHandler implements HandlerInterface
{
    /**
     * @inheritDoc
     */
    public function handles(): array
    {
        return [SuggestionRequest::class];
    }

    /**
     * @inheritDoc
     */
    public function toResponse(Psr\ResponseInterface $response): ResponseInterface
    {
        $data = json_decode($response->getBody()->getContents());
        $normalizer = new SuggestionsNormalizer();

        return new SuggestionResponse(
            $normalizer->normalize($data)
        );
    }
}
