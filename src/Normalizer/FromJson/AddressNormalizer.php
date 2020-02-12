<?php

declare(strict_types=1);

namespace DigipolisGent\Geopunt\Geolocation\Normalizer\FromJson;

use DigipolisGent\Geopunt\Geolocation\Value\Address;
use DigipolisGent\Geopunt\Geolocation\Value\Municipality;

/**
 * Normalizes JSON data into an address value.
 */
final class AddressNormalizer
{
    /**
     * Normalize the json data.
     *
     * @param object $jsonData
     *
     * @return \DigipolisGent\Geopunt\Geolocation\Value\Address
     */
    public function normalize(object $jsonData): Address
    {
        return new Address(
            $jsonData->Thoroughfarename ?? '',
            $jsonData->Housenumber ?? '',
            new Municipality(
                $jsonData->Zipcode ?? '',
                $jsonData->Municipality ?? ''
            )
        );
    }
}
