<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions\DatePoint;

enum TimezoneSource: string
{
    case CUSTOM = 'CUSTOM';

    case USER = 'USER';

    case PORTAL = 'PORTAL';
}
