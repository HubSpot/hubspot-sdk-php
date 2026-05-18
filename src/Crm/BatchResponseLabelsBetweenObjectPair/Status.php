<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\BatchResponseLabelsBetweenObjectPair;

/**
 * The status of the batch processing request: "PENDING", "PROCESSING", "CANCELLED", or "COMPLETE".
 */
enum Status: string
{
    case CANCELED = 'CANCELED';

    case COMPLETE = 'COMPLETE';

    case PENDING = 'PENDING';

    case PROCESSING = 'PROCESSING';
}
