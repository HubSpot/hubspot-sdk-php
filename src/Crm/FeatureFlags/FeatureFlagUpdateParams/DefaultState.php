<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\FeatureFlags\FeatureFlagUpdateParams;

/**
 * The state that the flag should have if there are no overrides for a particular portal.
 */
enum DefaultState: string
{
    case ABSENT = 'ABSENT';

    case OFF = 'OFF';

    case ON = 'ON';
}
