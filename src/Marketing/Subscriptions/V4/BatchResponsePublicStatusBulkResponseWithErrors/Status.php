<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V4\BatchResponsePublicStatusBulkResponseWithErrors;

/**
 * The current status of the operation, which can be PENDING, PROCESSING, CANCELED, or COMPLETE.
 */
enum Status: string
{
    case PENDING = 'PENDING';

    case PROCESSING = 'PROCESSING';

    case CANCELED = 'CANCELED';

    case COMPLETE = 'COMPLETE';
}
