<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\PublicThreadStatusChange;

enum NewStatus: string
{
    case OPEN = 'OPEN';

    case CLOSED = 'CLOSED';
}
