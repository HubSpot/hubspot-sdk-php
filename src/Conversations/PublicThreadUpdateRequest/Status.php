<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\PublicThreadUpdateRequest;

/**
 * The thread's status: `OPEN` or `CLOSED`.
 */
enum Status: string
{
    case OPEN = 'OPEN';

    case CLOSED = 'CLOSED';
}
