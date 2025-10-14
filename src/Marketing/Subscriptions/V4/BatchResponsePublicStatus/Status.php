<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V4\BatchResponsePublicStatus;

/**
 * The current status of the batch operation, which can be PENDING, PROCESSING, CANCELED, or COMPLETE.
 */
enum Status: string
{
    case PENDING = 'PENDING';

    case PROCESSING = 'PROCESSING';

    case CANCELED = 'CANCELED';

    case COMPLETE = 'COMPLETE';
}
