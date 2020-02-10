<?php

declare(strict_types=1);

namespace DigipolisGent\Geopunt\Geolocation\Value;

use DigipolisGent\Value\ValueAbstract;
use DigipolisGent\Value\ValueInterface;

/**
 * A municipality identified by postal code and name.
 */
final class Municipality extends ValueAbstract
{
    /**
     * The postal code.
     *
     * @var string
     */
    private $postalCode;

    /**
     * The municipality name.
     *
     * @var string
     */
    private $name;

    /**
     * Create the municipality from postal code and name.
     *
     * @param string $postalCode
     *   The postal code.
     * @param string $name
     *   The municipality name.
     */
    public function __construct(string $postalCode, string $name)
    {
        $this->postalCode = $postalCode;
        $this->name = $name;
    }

    /**
     * Get the postal code.
     *
     * @return string
     */
    public function postalCode(): string
    {
        return $this->postalCode;
    }

    /**
     * Get the municipality name.
     *
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @inheritDoc
     */
    public function sameValueAs(ValueInterface $object): bool
    {
        /** @var \DigipolisGent\Geopunt\Geolocation\Value\Municipality $object */
        return $this->sameValueTypeAs($object)
            && $this->postalCode() === $object->postalCode()
            && $this->name() === $object->name();
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return sprintf('%s %s', $this->postalCode(), $this->name());
    }
}
