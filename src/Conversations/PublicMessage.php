<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-import-type ConversationsPublicConversationsMessageShape from \HubspotSDK\Conversations\ConversationsPublicConversationsMessage
 * @phpstan-import-type PublicCommentShape from \HubspotSDK\Conversations\PublicComment
 * @phpstan-import-type PublicWelcomeMessageShape from \HubspotSDK\Conversations\PublicWelcomeMessage
 * @phpstan-import-type PublicAssignmentMessageShape from \HubspotSDK\Conversations\PublicAssignmentMessage
 * @phpstan-import-type PublicThreadStatusChangeShape from \HubspotSDK\Conversations\PublicThreadStatusChange
 * @phpstan-import-type PublicThreadInboxChangeShape from \HubspotSDK\Conversations\PublicThreadInboxChange
 *
 * @phpstan-type PublicMessageShape = ConversationsPublicConversationsMessageShape|PublicCommentShape|PublicWelcomeMessageShape|PublicAssignmentMessageShape|PublicThreadStatusChangeShape|PublicThreadInboxChangeShape
 */
final class PublicMessage implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            ConversationsPublicConversationsMessage::class,
            PublicComment::class,
            PublicWelcomeMessage::class,
            PublicAssignmentMessage::class,
            PublicThreadStatusChange::class,
            PublicThreadInboxChange::class,
        ];
    }
}
