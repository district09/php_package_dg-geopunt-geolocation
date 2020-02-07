<?php

declare(strict_types=1);

namespace DigipolisGent\Geopunt\Geolocation\Handler;

use DigipolisGent\API\Client\Handler\HandlerInterface;
use DigipolisGent\API\Client\Response\ResponseInterface;
use DigipolisGent\Geopunt\Geolocation\Normalizer\FromJson\LocationsNormalizer;
use DigipolisGent\Geopunt\Geolocation\Request\LocationRequest;
use DigipolisGent\Geopunt\Geolocation\Response\LocationResponse;
use Psr\Http\Message as Psr;

/**
 * Handles the Location request.
 */
final class LocationHandler implements HandlerInterface
{
    /**
     * @inheritDoc
     */
    public function handles(): array
    {
        return [LocationRequest::class];
    }

    /**
     * @inheritDoc
     */
    public function toResponse(Psr\ResponseInterface $response): ResponseInterface
    {
        $data = json_decode($response->getBody()->getContents());
        $normalizer = new LocationsNormalizer();

        return new LocationResponse(
            $normalizer->normalize($data)
        );
    }
}
