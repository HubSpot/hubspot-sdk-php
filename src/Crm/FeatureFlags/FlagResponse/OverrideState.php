<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\FeatureFlags\FlagResponse;

/**
 * An optional flag value that overrides all others for this flag name and app, including portal-level values.
 */
enum OverrideState: string
{
    case ABSENT = 'ABSENT';

    case OFF = 'OFF';

    case ON = 'ON';
}
