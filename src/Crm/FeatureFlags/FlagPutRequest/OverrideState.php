<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\FeatureFlags\FlagPutRequest;

enum OverrideState: string
{
    case ABSENT = 'ABSENT';

    case OFF = 'OFF';

    case ON = 'ON';
}
