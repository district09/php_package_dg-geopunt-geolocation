<?php

declare(strict_types=1);

namespace DigipolisGent\Tests\Geopunt\Geolocation\Request;

use DigipolisGent\API\Client\Request\AcceptType;
use DigipolisGent\API\Client\Request\MethodType;
use DigipolisGent\Geopunt\Geolocation\Request\SuggestionRequest;
use DigipolisGent\Geopunt\Geolocation\Value\Lookup;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DigipolisGent\Geopunt\Geolocation\Request\AbstractJsonRequest
 */
class AbstractJsonRequestTest extends TestCase
{
    /**
     * The method and accept headers are set.
     *
     * @test
     */
    public function methodAndHeadersAreSetDuringConstruction(): void
    {
        $lookup = new Lookup('bellevue gent', 5);
        $request = new SuggestionRequest($lookup);

        $this->assertEquals(MethodType::GET, $request->getMethod());
        $this->assertEquals([AcceptType::JSON], $request->getHeader('Accept'));
    }
}
