<?php

declare(strict_types=1);

namespace HubspotSDK\Account\Activity\APIUsage;

/**
 * Status of fetching the information, including if the data came from the cache.
 */
enum FetchStatus: string
{
    case CACHED = 'CACHED';

    case FAILURE = 'FAILURE';

    case NOTFOUND = 'NOTFOUND';

    case SUCCESS = 'SUCCESS';

    case TIMEOUT = 'TIMEOUT';
}
