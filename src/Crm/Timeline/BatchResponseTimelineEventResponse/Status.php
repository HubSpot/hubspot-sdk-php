<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Timeline\BatchResponseTimelineEventResponse;

/**
 * The status of the batch response. Should always be COMPLETED if processed.
 */
enum Status: string
{
    case CANCELED = 'CANCELED';

    case COMPLETE = 'COMPLETE';

    case PENDING = 'PENDING';

    case PROCESSING = 'PROCESSING';
}
