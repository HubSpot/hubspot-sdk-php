<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\FeatureFlags\FeatureFlagUpdateParams;

/**
 * A flag value that supercedes all other overrides, including portal-level values. Mostly used for things like emergency overrides.
 */
enum OverrideState: string
{
    case ABSENT = 'ABSENT';

    case OFF = 'OFF';

    case ON = 'ON';
}
