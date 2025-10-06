<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels\PublicChannelIntegrationMessageUpdateRequest;

enum StatusType: string
{
    case SENT = 'SENT';

    case FAILED = 'FAILED';

    case READ = 'READ';
}
