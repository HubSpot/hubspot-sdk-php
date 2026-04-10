<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\FeatureFlags\FlagPutRequest;

/**
 * A flag value that supercedes all other overrides, including portal-level values. Mostly used for things like emergency overrides.
 */
enum OverrideState: string
{
    case ABSENT = 'ABSENT';

    case OFF = 'OFF';

    case ON = 'ON';
}
