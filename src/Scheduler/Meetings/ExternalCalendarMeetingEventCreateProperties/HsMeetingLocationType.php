<?php

declare(strict_types=1);

namespace HubSpotSDK\Scheduler\Meetings\ExternalCalendarMeetingEventCreateProperties;

/**
 * The type of location for the meeting. Acceptable values are: ADDRESS, CUSTOM, PHONE.
 */
enum HsMeetingLocationType: string
{
    case ADDRESS = 'ADDRESS';

    case CUSTOM = 'CUSTOM';

    case PHONE = 'PHONE';
}
