<?php

declare(strict_types=1);

namespace DigipolisGent\Geopunt\Geolocation\Value;

use DigipolisGent\Value\ValueAbstract;
use DigipolisGent\Value\ValueInterface;
use Webmozart\Assert\Assert;

/**
 * The value used to lookup suggestions.
 */
final class Lookup extends ValueAbstract
{

    /**
     * The lookup string.
     *
     * @var string
     */
    private $query;

    /**
     * The number of requested suggestions.
     *
     * @var int
     */
    private $amount;

    /**
     * Create the suggestions lookup object from the query string and amount.
     *
     * @param string $query
     * @param int $amountOfSuggestions
     */
    public function __construct(string $query, int $amountOfSuggestions)
    {
        Assert::greaterThan($amountOfSuggestions, 0);

        $this->query = $query;
        $this->amount = $amountOfSuggestions;
    }

    /**
     * Get the query string.
     *
     * @return string
     */
    public function query(): string
    {
        return $this->query;
    }

    /**
     * Get the maximum number of suggestions.
     *
     * @return int
     */
    public function amount(): int
    {
        return $this->amount;
    }

    /**
     * @inheritDoc
     */
    public function sameValueAs(ValueInterface $object): bool
    {
        /** @var \DigipolisGent\Geopunt\Geolocation\Value\Lookup $object */
        return $this->sameValueTypeAs($object)
            && $this->query() === $object->query()
            && $this->amount() === $object->amount();
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return $this->query();
    }
}
