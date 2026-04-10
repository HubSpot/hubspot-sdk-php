<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\FeatureFlags\BatchPortalEntry;

/**
 * The flag state for this portal (e.g. ON or OFF).
 */
enum FlagState: string
{
    case ABSENT = 'ABSENT';

    case OFF = 'OFF';

    case ON = 'ON';
}
