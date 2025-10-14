<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V4\BatchResponsePublicStatusBulkResponse;

/**
 * The current status of the batch process, with possible values: PENDING, PROCESSING, CANCELED, COMPLETE.
 */
enum Status: string
{
    case PENDING = 'PENDING';

    case PROCESSING = 'PROCESSING';

    case CANCELED = 'CANCELED';

    case COMPLETE = 'COMPLETE';
}
