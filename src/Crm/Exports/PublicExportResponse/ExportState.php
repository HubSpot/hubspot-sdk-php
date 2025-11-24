<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Exports\PublicExportResponse;

/**
 * The current state of the export process.
 */
enum ExportState: string
{
    case CANCELED = 'CANCELED';

    case CONFLICT = 'CONFLICT';

    case DEFERRED = 'DEFERRED';

    case DELETED = 'DELETED';

    case DONE = 'DONE';

    case ENQUEUED = 'ENQUEUED';

    case FAILED = 'FAILED';

    case PENDING_APPROVAL = 'PENDING_APPROVAL';

    case PROCESSING = 'PROCESSING';
}
