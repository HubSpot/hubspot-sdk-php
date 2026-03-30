<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\FeatureFlags\FlagResponse;

/**
 * The flag state for any portal that doesn't have an override value.
 */
enum DefaultState: string
{
    case ABSENT = 'ABSENT';

    case OFF = 'OFF';

    case ON = 'ON';
}
