<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings\ExternalCalendarMeetingEventResponseProperties;

enum HsMeetingLocationType: string
{
    case ADDRESS = 'ADDRESS';

    case CUSTOM = 'CUSTOM';

    case PHONE = 'PHONE';
}
