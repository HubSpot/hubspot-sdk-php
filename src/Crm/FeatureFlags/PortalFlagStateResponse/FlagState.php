<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\FeatureFlags\PortalFlagStateResponse;

/**
 * The state of the flag for this portal.
 */
enum FlagState: string
{
    case ABSENT = 'ABSENT';

    case OFF = 'OFF';

    case ON = 'ON';
}
