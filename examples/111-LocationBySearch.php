<?php

/**
 * Example how to get the location details by a search string.
 *
 * @var string $apiEndpoint
 * @var int $locationLimit
 * @var float $locationBySearch
 * @var \Symfony\Component\Console\Output\ConsoleOutput $output
 */

declare(strict_types=1);

use DigipolisGent\API\Client\Configuration\Configuration;
use DigipolisGent\Geopunt\Geolocation\Client\Client;
use DigipolisGent\Geopunt\Geolocation\Filter\RestrictByTypeFilter;
use DigipolisGent\Geopunt\Geolocation\GeolocationFactory;
use Symfony\Component\Console\Helper\Table;

require_once __DIR__ . '/bootstrap.php';

printTitle('Get a list of location by a search string.');

printStep('Create the API client configuration.');
$configuration = new Configuration($apiEndpoint);

printStep('Create the Guzzle client.');
$guzzleClient = new GuzzleHttp\Client(['base_uri' => $configuration->getUri()]);

printStep('Create the HTTP client.');
$client = new Client($guzzleClient, $configuration);

printStep('Create the Service wrapper.');
$service = GeolocationFactory::create($client);

printStep('Get locations.');
$locations = $service->locationsBySearch(
    $locationBySearch,
    $locationLimit,
    RestrictByTypeFilter::HOUSENUMBER
);

$count = $locations->getIterator()->count();

if (!$count) {
    printText('No locations found.');
}

if ($count) {
    printText('Found %d locations', $count);
    printText('');

    foreach ($locations as $location) {
        /** @var \DigipolisGent\Geopunt\Geolocation\Value\Location $location */
        $table = new Table($output);
        $table->addRows(
            [
                ['ID', (string) $location->locationId()],
                ['Street name', $location->address()->streetName()],
                ['House number', $location->address()->houseNumber()],
                ['Postal code', $location->address()->postalCode()],
                ['Municipality name', $location->address()->municipalityName()],
                ['Coordinates WGS84', (string) $location->position()->wgs84()],
                ['Coordinates Lambert72', (string) $location->position()->lambert72()],
                [
                    'Bounding box WGS84',
                    (string) $location->boundingBox()
                ],
                [
                    'Bounding box Lambert72',
                    (string) $location->boundingBox()->lowerLeft()->lambert72()
                    . PHP_EOL
                    . (string) $location->boundingBox()->upperRight()->lambert72()
                ]
            ]
        );
        $table->render();
    }
}

printFooter();
