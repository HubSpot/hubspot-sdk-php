<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\Threads\ThreadUpdateParams;

enum Status: string
{
    case CLOSED = 'CLOSED';

    case OPEN = 'OPEN';
}
