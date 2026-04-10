<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Exports\ActionResponseWithSingleResultUri;

/**
 * The current status of the export, which can be PENDING, PROCESSING, COMPLETE or CANCELED.
 */
enum Status: string
{
    case CANCELED = 'CANCELED';

    case COMPLETE = 'COMPLETE';

    case PENDING = 'PENDING';

    case PROCESSING = 'PROCESSING';
}
