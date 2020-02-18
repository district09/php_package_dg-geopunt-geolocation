<?php

/**
 * Example how to get a list of address suggestions.
 */

declare(strict_types=1);

use DigipolisGent\API\Client\Configuration\Configuration;
use DigipolisGent\Geopunt\Geolocation\Client\Client;
use DigipolisGent\Geopunt\Geolocation\GeolocationFactory;
use Symfony\Component\Console\Helper\Table;

require_once __DIR__ . '/bootstrap.php';

printTitle('Get a list of address suggestions.');

printStep('Create the API client configuration.');
$configuration = new Configuration($apiEndpoint);

printStep('Create the Guzzle client.');
$guzzleClient = new GuzzleHttp\Client(['base_uri' => $configuration->getUri()]);

printStep('Create the HTTP client.');
$client = new Client($guzzleClient, $configuration);

printStep('Create the Service wrapper.');
$service = GeolocationFactory::create($client);

printStep('Get suggestions.');
$suggestions = $service->suggestions($suggestionsSearch, $suggestionsLimit);

$table = new Table($output);
$table->setHeaders(['Suggestions']);
foreach ($suggestions as $suggestion) {
    /** @var \DigipolisGent\Geopunt\Geolocation\Value\Suggestion $suggestion */
    $table->addRow([(string) $suggestion]);
}
$table->render();

printFooter();
