<?php

declare(strict_types=1);

namespace DigipolisGent\Tests\Geopunt\Geolocation\Request;

use DigipolisGent\API\Client\Request\AcceptType;
use DigipolisGent\API\Client\Request\MethodType;
use DigipolisGent\Geopunt\Geolocation\Filter\Filters;
use DigipolisGent\Geopunt\Geolocation\Request\SuggestionRequest;
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
        $filters = new Filters();
        $request = new SuggestionRequest($filters);

        $this->assertEquals(MethodType::GET, $request->getMethod());
        $this->assertEquals([AcceptType::JSON], $request->getHeader('Accept'));
    }
}
