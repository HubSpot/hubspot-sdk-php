<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Properties\BatchResponseProperty;

/**
 * The current status of the batch operation, with possible values being CANCELED, COMPLETE, PENDING, or PROCESSING.
 */
enum Status: string
{
    case CANCELED = 'CANCELED';

    case COMPLETE = 'COMPLETE';

    case PENDING = 'PENDING';

    case PROCESSING = 'PROCESSING';
}
