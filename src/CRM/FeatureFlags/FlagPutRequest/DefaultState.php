<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\FeatureFlags\FlagPutRequest;

enum DefaultState: string
{
    case OFF = 'OFF';

    case ON = 'ON';

    case ABSENT = 'ABSENT';
}
