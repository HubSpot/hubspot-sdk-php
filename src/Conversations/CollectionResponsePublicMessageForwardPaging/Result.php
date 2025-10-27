<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CollectionResponsePublicMessageForwardPaging;

use HubspotSDK\Conversations\PublicAssignmentMessage;
use HubspotSDK\Conversations\PublicComment;
use HubspotSDK\Conversations\PublicConversationsMessage;
use HubspotSDK\Conversations\PublicThreadInboxChange;
use HubspotSDK\Conversations\PublicThreadStatusChange;
use HubspotSDK\Conversations\PublicWelcomeMessage;
use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

final class Result implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,
     * string|Converter|ConverterSource,>
     */
    public static function variants(): array
    {
        return [
            PublicConversationsMessage::class,
            PublicComment::class,
            PublicWelcomeMessage::class,
            PublicAssignmentMessage::class,
            PublicThreadStatusChange::class,
            PublicThreadInboxChange::class,
        ];
    }
}
