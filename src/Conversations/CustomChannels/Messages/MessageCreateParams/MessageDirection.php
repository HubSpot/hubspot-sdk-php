<?php

declare(strict_types=1);

namespace HubSpotSDK\Conversations\CustomChannels\Messages\MessageCreateParams;

enum MessageDirection: string
{
    case INCOMING = 'INCOMING';

    case OUTGOING = 'OUTGOING';
}
