<?php

declare(strict_types=1);

namespace HubspotSDK\PublicUnifiedEventsFilterBranch;

enum Operator: string
{
    case HAS_COMPLETED = 'HAS_COMPLETED';

    case HAS_NOT_COMPLETED = 'HAS_NOT_COMPLETED';
}
