<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\FeatureFlags\PortalFlagStateResponse;

enum FlagState: string
{
    case OFF = 'OFF';

    case ON = 'ON';

    case ABSENT = 'ABSENT';
}
