<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels\ChannelIntegrationMessageEgg;

enum MessageDirection: string
{
    case INCOMING = 'INCOMING';

    case OUTGOING = 'OUTGOING';
}
