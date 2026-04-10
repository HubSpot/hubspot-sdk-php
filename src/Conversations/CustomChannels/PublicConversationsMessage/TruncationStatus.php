<?php

declare(strict_types=1);

namespace HubSpotSDK\Conversations\CustomChannels\PublicConversationsMessage;

enum TruncationStatus: string
{
    case NOT_TRUNCATED = 'NOT_TRUNCATED';

    case TRUNCATED = 'TRUNCATED';

    case TRUNCATED_TO_MOST_RECENT_REPLY = 'TRUNCATED_TO_MOST_RECENT_REPLY';
}
