<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions\TimeOffset;

enum TimeUnit: string
{
    case WEEKS = 'WEEKS';

    case DAYS = 'DAYS';

    case HOURS = 'HOURS';

    case MINUTES = 'MINUTES';
}
