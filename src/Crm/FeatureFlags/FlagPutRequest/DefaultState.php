<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\FeatureFlags\FlagPutRequest;

enum DefaultState: string
{
    case OFF = 'OFF';

    case ON = 'ON';

    case ABSENT = 'ABSENT';
}
