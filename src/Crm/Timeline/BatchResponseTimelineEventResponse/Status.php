<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Timeline\BatchResponseTimelineEventResponse;

/**
 * The status of the batch response. Should always be COMPLETED if processed.
 */
enum Status: string
{
    case PENDING = 'PENDING';

    case PROCESSING = 'PROCESSING';

    case CANCELED = 'CANCELED';

    case COMPLETE = 'COMPLETE';
}
