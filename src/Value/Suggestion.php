<?php

declare(strict_types=1);

namespace DigipolisGent\Geopunt\Geolocation\Value;

use DigipolisGent\Value\ValueAbstract;
use DigipolisGent\Value\ValueInterface;

/**
 * A single suggestion.
 */
final class Suggestion extends ValueAbstract
{

    /**
     * The suggestion string.
     *
     * @var string
     */
    private $suggestion;

    /**
     * Create the suggestion value from the returned string.
     *
     * @param string $suggestion
     */
    public function __construct(string $suggestion)
    {
        $this->suggestion = $suggestion;
    }

    /**
     * Get the suggestion value.
     *
     * @return string
     */
    public function suggestion(): string
    {
        return $this->suggestion;
    }

    /**
     * @inheritDoc
     */
    public function sameValueAs(ValueInterface $object): bool
    {
        /** @var \DigipolisGent\Geopunt\Geolocation\Value\Suggestion $object */
        return $this->sameValueTypeAs($object)
            && $this->suggestion() === $object->suggestion();
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return $this->suggestion();
    }
}
