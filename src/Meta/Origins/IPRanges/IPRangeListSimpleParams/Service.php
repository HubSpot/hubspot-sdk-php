<?php

declare(strict_types=1);

namespace HubspotSDK\Meta\Origins\IPRanges\IPRangeListSimpleParams;

enum Service: string
{
    case EMAIL = 'EMAIL';

    case API = 'API';

    case DNS = 'DNS';

    case WEB_SCRAPING = 'WEB_SCRAPING';
}
