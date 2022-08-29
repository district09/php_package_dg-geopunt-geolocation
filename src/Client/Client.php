<?php

declare(strict_types=1);

namespace DigipolisGent\Geopunt\Geolocation\Client;

use DigipolisGent\API\Client\AbstractClient;
use DigipolisGent\API\Client\Response\ResponseInterface;
use DigipolisGent\API\Logger\RequestLog;
use Psr\Http\Message\RequestInterface;

/**
 * Class ClientAbstract.
 */
final class Client extends AbstractClient
{
    /**
     * Sends a Request and returns the appropriate Response.
     *
     * @param \Psr\Http\Message\RequestInterface $request
     *
     * @return \DigipolisGent\API\Client\Response\ResponseInterface
     *
     * @throws \DigipolisGent\API\Client\Exception\HandlerNotFound
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function send(RequestInterface $request): ResponseInterface
    {
        $psrRequest = $this->injectHeaders($request);

        $this->log(new RequestLog($request));

        $handler = $this->getHandler($request);
        $psrResponse = $this->guzzle->send($psrRequest);

        return $handler->toResponse($psrResponse);
    }
}
