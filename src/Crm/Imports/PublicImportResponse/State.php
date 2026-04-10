<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Imports\PublicImportResponse;

/**
 * The status of the import.
 */
enum State: string
{
    case CANCELED = 'CANCELED';

    case DEFERRED = 'DEFERRED';

    case DONE = 'DONE';

    case FAILED = 'FAILED';

    case PROCESSING = 'PROCESSING';

    case REVERTED = 'REVERTED';

    case STARTED = 'STARTED';
}
