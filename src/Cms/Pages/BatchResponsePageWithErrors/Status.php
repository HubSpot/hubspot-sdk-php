<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages\BatchResponsePageWithErrors;

/**
 * Status of batch operation.
 */
enum Status: string
{
    case CANCELED = 'CANCELED';

    case COMPLETE = 'COMPLETE';

    case PENDING = 'PENDING';

    case PROCESSING = 'PROCESSING';
}
