<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\BatchResponseSimplePublicObject;

/**
 * The status of the batch processing request. The expected value is "COMPLETE".
 */
enum Status: string
{
    case CANCELED = 'CANCELED';

    case COMPLETE = 'COMPLETE';

    case PENDING = 'PENDING';

    case PROCESSING = 'PROCESSING';
}
