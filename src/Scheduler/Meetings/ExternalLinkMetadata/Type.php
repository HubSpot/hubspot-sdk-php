<?php

declare(strict_types=1);

namespace HubSpotSDK\Scheduler\Meetings\ExternalLinkMetadata;

/**
 * The type of the external meeting link. Accepted values are: PERSONAL_LINK, GROUP_CALENDAR, ROUND_ROBIN_CALENDAR.
 */
enum Type: string
{
    case GROUP_CALENDAR = 'GROUP_CALENDAR';

    case PERSONAL_LINK = 'PERSONAL_LINK';

    case ROUND_ROBIN_CALENDAR = 'ROUND_ROBIN_CALENDAR';
}
