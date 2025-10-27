<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\PublicConversationsMessage;

enum Direction: string
{
    case INCOMING = 'INCOMING';

    case OUTGOING = 'OUTGOING';
}
