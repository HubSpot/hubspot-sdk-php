<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\FeatureFlags\Apps\AppUpdateParams;

enum OverrideState: string
{
    case OFF = 'OFF';

    case ON = 'ON';

    case ABSENT = 'ABSENT';
}
