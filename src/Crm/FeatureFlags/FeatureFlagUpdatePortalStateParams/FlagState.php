<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\FeatureFlags\FeatureFlagUpdatePortalStateParams;

/**
 * The state that the given flag should be in for this portal.
 */
enum FlagState: string
{
    case ABSENT = 'ABSENT';

    case OFF = 'OFF';

    case ON = 'ON';
}
