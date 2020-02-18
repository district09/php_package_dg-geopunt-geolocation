<?php

declare(strict_types=1);

namespace DigipolisGent\Geopunt\Geolocation\Normalizer\FromJson;

use DigipolisGent\Geopunt\Geolocation\Value\Position\BoundingBox;

/**
 * Normalizes JSON data into a bounding box value.
 */
final class BoundingBoxNormalizer
{
    /**
     * Normalize the json data.
     *
     * @param object $jsonData
     *
     * @return \DigipolisGent\Geopunt\Geolocation\Value\Position\BoundingBox
     */
    public function normalize(object $jsonData): BoundingBox
    {
        $positionNormalizer = new PositionNormalizer();

        return new BoundingBox(
            $positionNormalizer->normalize($jsonData->LowerLeft),
            $positionNormalizer->normalize($jsonData->UpperRight)
        );
    }
}
