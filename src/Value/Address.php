<?php

declare(strict_types=1);

namespace DigipolisGent\Geopunt\Geolocation\Value;

use DigipolisGent\Value\ValueAbstract;
use DigipolisGent\Value\ValueInterface;

/**
 * An address.
 */
final class Address extends ValueAbstract
{
    /**
     * The street name.
     *
     * @var string
     */
    private $streetName;

    /**
     * The house number.
     *
     * @var string
     */
    private $houseNumber;

    /**
     * The municipality.
     *
     * @var \DigipolisGent\Geopunt\Geolocation\Value\Municipality
     */
    private $municipality;

    /**
     * Create the address from street name, house number, and municipality.
     *
     * @param string $streetName
     *   The street name.
     * @param string $houseNumber
     *   The house number.
     * @param \DigipolisGent\Geopunt\Geolocation\Value\Municipality $municipality
     *   The municipality.
     */
    public function __construct(string $streetName, string $houseNumber, Municipality $municipality)
    {
        $this->streetName = $streetName;
        $this->houseNumber = $houseNumber;
        $this->municipality = $municipality;
    }

    /**
     * Get the street name.
     *
     * @return string
     */
    public function streetName(): string
    {
        return $this->streetName;
    }

    /**
     * Get the house number.
     *
     * @return string
     */
    public function houseNumber(): string
    {
        return $this->houseNumber;
    }

    /**
     * Get the municipality value.
     *
     * @return \DigipolisGent\Geopunt\Geolocation\Value\Municipality
     */
    public function municipality(): Municipality
    {
        return $this->municipality;
    }

    /**
     * Get the postal code.
     *
     * @return string
     */
    public function postalCode(): string
    {
        return $this->municipality()->postalCode();
    }

    /**
     * Get the municipality name.
     *
     * @return string
     */
    public function municipalityName(): string
    {
        return $this->municipality()->name();
    }

    /**
     * @inheritDoc
     */
    public function sameValueAs(ValueInterface $object): bool
    {
        /** @var \DigipolisGent\Geopunt\Geolocation\Value\Address $object */
        return $this->sameValueTypeAs($object)
            && $this->streetName() === $object->streetName()
            && $this->houseNumber() === $object->houseNumber()
            && $this->municipality()->sameValueAs($object->municipality());
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return sprintf(
            '%s %s, %s',
            $this->streetName(),
            $this->houseNumber(),
            $this->municipality()
        );
    }
}
