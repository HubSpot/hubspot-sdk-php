<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\BatchResponseSimplePublicObject;

/**
 * The status of the batch processing request: "PENDING", "PROCESSING", "CANCELLED", or "COMPLETE".
 */
enum Status: string
{
    case PENDING = 'PENDING';

    case PROCESSING = 'PROCESSING';

    case CANCELED = 'CANCELED';

    case COMPLETE = 'COMPLETE';
}
