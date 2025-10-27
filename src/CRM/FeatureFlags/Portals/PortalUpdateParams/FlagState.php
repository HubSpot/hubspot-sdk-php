<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\FeatureFlags\Portals\PortalUpdateParams;

enum FlagState: string
{
    case OFF = 'OFF';

    case ON = 'ON';

    case ABSENT = 'ABSENT';
}
