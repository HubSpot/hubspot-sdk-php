<?php

declare(strict_types=1);

namespace HubspotSDK\Files\FileActionResponse;

/**
 * Current status of the task.
 */
enum Status: string
{
    case PENDING = 'PENDING';

    case PROCESSING = 'PROCESSING';

    case CANCELED = 'CANCELED';

    case COMPLETE = 'COMPLETE';
}
