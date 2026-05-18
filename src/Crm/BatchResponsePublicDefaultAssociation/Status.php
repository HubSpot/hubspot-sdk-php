<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\BatchResponsePublicDefaultAssociation;

/**
 * The status of the batch processing request. Can be: "PENDING", "PROCESSING", "CANCELED", or "COMPLETE".
 */
enum Status: string
{
    case CANCELED = 'CANCELED';

    case COMPLETE = 'COMPLETE';

    case PENDING = 'PENDING';

    case PROCESSING = 'PROCESSING';
}
