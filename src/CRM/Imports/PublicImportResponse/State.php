<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Imports\PublicImportResponse;

/**
 * The status of the import.
 */
enum State: string
{
    case STARTED = 'STARTED';

    case PROCESSING = 'PROCESSING';

    case DONE = 'DONE';

    case FAILED = 'FAILED';

    case CANCELED = 'CANCELED';

    case DEFERRED = 'DEFERRED';

    case REVERTED = 'REVERTED';
}
