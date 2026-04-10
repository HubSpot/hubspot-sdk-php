<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists\PublicUnifiedEventsFilterBranch;

/**
 * Defines the operation to be applied within the filter branch (HAS_COMPLETED, HAS_NOT_COMPLETED).
 */
enum Operator: string
{
    case HAS_COMPLETED = 'HAS_COMPLETED';

    case HAS_NOT_COMPLETED = 'HAS_NOT_COMPLETED';
}
