<?php

declare(strict_types=1);

namespace HubSpotSDK\Scheduler\Meetings\ExternalMeetingsUser;

/**
 * The calendar provider associated with the user. Accepted values are: GOOGLE, OFFICE365, EXCHANGE, UNKNOWN.
 */
enum CalendarProvider: string
{
    case EXCHANGE = 'EXCHANGE';

    case GOOGLE = 'GOOGLE';

    case OFFICE365 = 'OFFICE365';

    case UNKNOWN = 'UNKNOWN';
}
