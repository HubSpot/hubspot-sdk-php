<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb\BatchResponseHubDBTableRowV3WithErrors;

/**
 * The current status of the batch operation, with possible values: CANCELED, COMPLETE, PENDING, PROCESSING.
 */
enum Status: string
{
    case CANCELED = 'CANCELED';

    case COMPLETE = 'COMPLETE';

    case PENDING = 'PENDING';

    case PROCESSING = 'PROCESSING';
}
