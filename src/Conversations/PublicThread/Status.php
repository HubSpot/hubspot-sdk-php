<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\PublicThread;

enum Status: string
{
    case CLOSED = 'CLOSED';

    case OPEN = 'OPEN';
}
