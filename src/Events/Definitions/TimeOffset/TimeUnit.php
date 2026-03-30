<?php

declare(strict_types=1);

namespace HubspotSDK\Events\Definitions\TimeOffset;

enum TimeUnit: string
{
    case DAYS = 'DAYS';

    case HOURS = 'HOURS';

    case MINUTES = 'MINUTES';

    case WEEKS = 'WEEKS';
}
