<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\FeatureFlags\PortalFlagStateResponse;

enum FlagState: string
{
    case ABSENT = 'ABSENT';

    case OFF = 'OFF';

    case ON = 'ON';
}
