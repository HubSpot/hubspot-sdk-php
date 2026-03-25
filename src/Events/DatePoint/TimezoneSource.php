<?php

declare(strict_types=1);

namespace HubspotSDK\Events\DatePoint;

enum TimezoneSource: string
{
    case CUSTOM = 'CUSTOM';

    case PORTAL = 'PORTAL';

    case USER = 'USER';
}
