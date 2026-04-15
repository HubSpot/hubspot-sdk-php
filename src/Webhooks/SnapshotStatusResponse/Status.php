<?php

declare(strict_types=1);

namespace HubSpotSDK\Webhooks\SnapshotStatusResponse;

/**
 * The current status of the snapshot operation. Valid values include 'PENDING', 'IN_PROGRESS', 'COMPLETED', 'FAILED', and 'EXPIRED'.
 */
enum Status: string
{
    case COMPLETED = 'COMPLETED';

    case EXPIRED = 'EXPIRED';

    case FAILED = 'FAILED';

    case IN_PROGRESS = 'IN_PROGRESS';

    case PENDING = 'PENDING';
}
