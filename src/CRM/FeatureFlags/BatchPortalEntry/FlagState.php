<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\FeatureFlags\BatchPortalEntry;

enum FlagState: string
{
    case OFF = 'OFF';

    case ON = 'ON';

    case ABSENT = 'ABSENT';
}
