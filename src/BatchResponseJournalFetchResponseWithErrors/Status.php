<?php

declare(strict_types=1);

namespace HubSpotSDK\BatchResponseJournalFetchResponseWithErrors;

/**
 * The current status of the batch process. Valid values include 'PENDING', 'PROCESSING', 'CANCELED', and 'COMPLETE'.
 */
enum Status: string
{
    case CANCELED = 'CANCELED';

    case COMPLETE = 'COMPLETE';

    case PENDING = 'PENDING';

    case PROCESSING = 'PROCESSING';
}
