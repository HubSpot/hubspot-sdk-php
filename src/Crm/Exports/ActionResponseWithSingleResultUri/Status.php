<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Exports\ActionResponseWithSingleResultUri;

/**
 * The current status of the export, which can be PENDING, PROCESSING, COMPLETE or CANCELED.
 */
enum Status: string
{
    case PENDING = 'PENDING';

    case PROCESSING = 'PROCESSING';

    case CANCELED = 'CANCELED';

    case COMPLETE = 'COMPLETE';
}
