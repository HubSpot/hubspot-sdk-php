<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings\ExternalBookingInfo;

/**
 * The type of the meeting link. Accepted values are: GROUP_CALENDAR, PERSONAL_LINK, ROUND_ROBIN_CALENDAR.
 */
enum LinkType: string
{
    case GROUP_CALENDAR = 'GROUP_CALENDAR';

    case PERSONAL_LINK = 'PERSONAL_LINK';

    case ROUND_ROBIN_CALENDAR = 'ROUND_ROBIN_CALENDAR';
}
