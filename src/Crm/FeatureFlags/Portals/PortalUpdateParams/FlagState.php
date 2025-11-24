<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\FeatureFlags\Portals\PortalUpdateParams;

enum FlagState: string
{
    case ABSENT = 'ABSENT';

    case OFF = 'OFF';

    case ON = 'ON';
}
