<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings\ExternalBookingInfo;

enum LinkType: string
{
    case GROUP_CALENDAR = 'GROUP_CALENDAR';

    case PERSONAL_LINK = 'PERSONAL_LINK';

    case ROUND_ROBIN_CALENDAR = 'ROUND_ROBIN_CALENDAR';
}
