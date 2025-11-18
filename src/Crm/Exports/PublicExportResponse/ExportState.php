<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Exports\PublicExportResponse;

/**
 * The current state of the export process.
 */
enum ExportState: string
{
    case ENQUEUED = 'ENQUEUED';

    case PROCESSING = 'PROCESSING';

    case DONE = 'DONE';

    case FAILED = 'FAILED';

    case CANCELED = 'CANCELED';

    case CONFLICT = 'CONFLICT';

    case DELETED = 'DELETED';

    case DEFERRED = 'DEFERRED';

    case PENDING_APPROVAL = 'PENDING_APPROVAL';
}
