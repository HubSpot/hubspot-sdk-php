<?php

declare(strict_types=1);

namespace HubSpotSDK\Scheduler\Meetings\ExternalReminder;

/**
 * Accepted values are: WEEKS, DAYS, HOURS, MINUTES.
 */
enum TimeUnit: string
{
    case DAYS = 'DAYS';

    case HOURS = 'HOURS';

    case MINUTES = 'MINUTES';

    case WEEKS = 'WEEKS';
}
