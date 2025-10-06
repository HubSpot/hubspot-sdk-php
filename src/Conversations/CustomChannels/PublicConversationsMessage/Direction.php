<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels\PublicConversationsMessage;

enum Direction: string
{
    case INCOMING = 'INCOMING';

    case OUTGOING = 'OUTGOING';
}
