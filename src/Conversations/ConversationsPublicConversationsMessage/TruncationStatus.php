<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\ConversationsPublicConversationsMessage;

enum TruncationStatus: string
{
    case NOT_TRUNCATED = 'NOT_TRUNCATED';

    case TRUNCATED_TO_MOST_RECENT_REPLY = 'TRUNCATED_TO_MOST_RECENT_REPLY';

    case TRUNCATED = 'TRUNCATED';
}
