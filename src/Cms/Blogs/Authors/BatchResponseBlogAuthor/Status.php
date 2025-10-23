<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Authors\BatchResponseBlogAuthor;

/**
 * Status of batch operation.
 */
enum Status: string
{
    case PENDING = 'PENDING';

    case PROCESSING = 'PROCESSING';

    case CANCELED = 'CANCELED';

    case COMPLETE = 'COMPLETE';
}
