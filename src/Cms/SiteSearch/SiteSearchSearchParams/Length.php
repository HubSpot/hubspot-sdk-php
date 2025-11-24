<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\SiteSearch\SiteSearchSearchParams;

/**
 * Specifies the length of the search results. Can be set to `LONG` or `SHORT`. `SHORT` will return the first 128 characters of the content's meta description. `LONG` will build a more detailed content snippet based on the html/content of the page.
 */
enum Length: string
{
    case LONG = 'LONG';

    case SHORT = 'SHORT';
}
