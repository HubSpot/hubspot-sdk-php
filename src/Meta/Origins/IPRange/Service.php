<?php

declare(strict_types=1);

namespace HubspotSDK\Meta\Origins\IPRange;

/**
 * The service associated with the IP range, such as EMAIL, API, DNS, or WEB_SCRAPING.
 */
enum Service: string
{
    case API = 'API';

    case DNS = 'DNS';

    case EMAIL = 'EMAIL';

    case TEST_SERVICE = 'TEST_SERVICE';

    case WEB_SCRAPING = 'WEB_SCRAPING';
}
