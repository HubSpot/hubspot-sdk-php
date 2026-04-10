<?php

declare(strict_types=1);

namespace HubSpotSDK\Files\FolderActionResponse;

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
