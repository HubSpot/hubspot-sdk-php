<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Blogs\Tags\BatchResponseTagWithErrors;

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
