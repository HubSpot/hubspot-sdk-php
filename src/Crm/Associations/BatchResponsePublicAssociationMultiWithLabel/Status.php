<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\BatchResponsePublicAssociationMultiWithLabel;

/**
 * The status of the batch processing request: "PENDING", "PROCESSING", "CANCELED", or "COMPLETE".
 */
enum Status: string
{
    case CANCELED = 'CANCELED';

    case COMPLETE = 'COMPLETE';

    case PENDING = 'PENDING';

    case PROCESSING = 'PROCESSING';
}
