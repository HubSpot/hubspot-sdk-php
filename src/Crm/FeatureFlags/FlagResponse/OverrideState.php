<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\FeatureFlags\FlagResponse;

enum OverrideState: string
{
    case OFF = 'OFF';

    case ON = 'ON';

    case ABSENT = 'ABSENT';
}
