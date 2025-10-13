<?php

declare(strict_types=1);

namespace HubspotSDK\Account\APIUsage;

/**
 * Status of fetching the information, including if the data came from the cache.
 */
enum FetchStatus: string
{
    case SUCCESS = 'SUCCESS';

    case TIMEOUT = 'TIMEOUT';

    case FAILURE = 'FAILURE';

    case CACHED = 'CACHED';

    case NOTFOUND = 'NOTFOUND';
}
