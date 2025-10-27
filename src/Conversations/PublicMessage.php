<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

final class PublicMessage implements ConverterSource
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
