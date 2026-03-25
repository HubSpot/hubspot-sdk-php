<?php

declare(strict_types=1);

namespace HubspotSDK\CommunicationPreferences\BatchResponsePublicWideStatusBulkResponse;

/**
 * The current status of the batch process, with possible values: PENDING, PROCESSING, CANCELED, COMPLETE.
 */
enum Status: string
{
    case CANCELED = 'CANCELED';

    case COMPLETE = 'COMPLETE';

    case PENDING = 'PENDING';

    case PROCESSING = 'PROCESSING';
}
