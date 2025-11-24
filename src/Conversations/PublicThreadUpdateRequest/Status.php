<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\PublicThreadUpdateRequest;

enum Status: string
{
    case CLOSED = 'CLOSED';

    case OPEN = 'OPEN';
}
