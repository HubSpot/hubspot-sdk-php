<?php

declare(strict_types=1);

namespace HubspotSDK\Events\Send\TimeOffset;

enum TimeUnit: string
{
    case DAYS = 'DAYS';

    case HOURS = 'HOURS';

    case MINUTES = 'MINUTES';

    case WEEKS = 'WEEKS';
}
