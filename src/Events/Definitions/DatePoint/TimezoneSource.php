<?php

declare(strict_types=1);

namespace HubSpotSDK\Events\Definitions\DatePoint;

enum TimezoneSource: string
{
    case CUSTOM = 'CUSTOM';

    case PORTAL = 'PORTAL';

    case USER = 'USER';
}
