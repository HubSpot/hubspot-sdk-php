<?php

declare(strict_types=1);

namespace HubspotSDK\Files\FileActionResponse;

/**
 * Current status of the task.
 */
enum Status: string
{
    case CANCELED = 'CANCELED';

    case COMPLETE = 'COMPLETE';

    case PENDING = 'PENDING';

    case PROCESSING = 'PROCESSING';
}
