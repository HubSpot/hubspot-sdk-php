<?php

declare(strict_types=1);

namespace HubSpotSDK\Conversations\CustomChannels\PublicConversationsMessage;

enum Direction: string
{
    case INCOMING = 'INCOMING';

    case OUTGOING = 'OUTGOING';
}
