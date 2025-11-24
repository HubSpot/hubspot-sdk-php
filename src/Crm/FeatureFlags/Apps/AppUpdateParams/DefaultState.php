<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\FeatureFlags\Apps\AppUpdateParams;

enum DefaultState: string
{
    case ABSENT = 'ABSENT';

    case OFF = 'OFF';

    case ON = 'ON';
}
