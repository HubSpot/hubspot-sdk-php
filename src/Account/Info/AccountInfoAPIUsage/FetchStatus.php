<?php

declare(strict_types=1);

namespace HubspotSDK\Account\Info\AccountInfoAPIUsage;

enum FetchStatus: string
{
    case SUCCESS = 'SUCCESS';

    case TIMEOUT = 'TIMEOUT';

    case FAILURE = 'FAILURE';

    case CACHED = 'CACHED';

    case NOTFOUND = 'NOTFOUND';
}
