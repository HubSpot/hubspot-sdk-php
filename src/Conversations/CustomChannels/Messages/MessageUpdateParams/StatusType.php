<?php

declare(strict_types=1);

namespace HubSpotSDK\Conversations\CustomChannels\Messages\MessageUpdateParams;

/**
 * Valid status are SENT, FAILED, and READ.
 */
enum StatusType: string
{
    case FAILED = 'FAILED';

    case READ = 'READ';

    case SENT = 'SENT';
}
