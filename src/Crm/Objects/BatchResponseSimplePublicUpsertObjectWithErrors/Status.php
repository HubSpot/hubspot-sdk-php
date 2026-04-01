<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\BatchResponseSimplePublicUpsertObjectWithErrors;

/**
 * The status of the batch processing request. Can be: "PENDING", "PROCESSING", "CANCELLED", or "COMPLETE".
 */
enum Status: string
{
    case CANCELED = 'CANCELED';

    case COMPLETE = 'COMPLETE';

    case PENDING = 'PENDING';

    case PROCESSING = 'PROCESSING';
}
