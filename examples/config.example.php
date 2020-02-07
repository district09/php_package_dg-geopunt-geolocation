<?php

/**
 * Config file containing the credentials to connect to the service.
 */

// The service endpoint.
$apiEndpoint = 'https://loc.geopunt.be/v4/';

/**
 * Get suggestions based on search string
 *
 * https://loc.geopunt.be/v4/suggestion?q=Belle%201%20gent&c=10
 */
// Max number of results (should be not more than 25).
$suggestionsLimit = 10;

// Search string (example 101).
$suggestionsSearch = 'Bellevue Gent';


/**
 * Get locations.
 *
 * https://loc.geopunt.be/v4/location?q=Bellevue%201%209050%20Ledeberg&c=5
 */
// Max number of results (should be not more than 5).
$locationLimit = 5;

// Getlocations by search string (example 111).
$locationBySearch = 'Bellevue 1 9050 Ledeberg';
