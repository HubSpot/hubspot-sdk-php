<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels\PublicChannelIntegrationMessageUpdateRequest;

/**
 * Valid status are SENT, FAILED, and READ.
 */
enum StatusType: string
{
    case SENT = 'SENT';

    case FAILED = 'FAILED';

    case READ = 'READ';
}
