<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-import-type PublicConversationsMessageEggShape from \HubspotSDK\Conversations\PublicConversationsMessageEgg
 * @phpstan-import-type PublicCommentEggShape from \HubspotSDK\Conversations\PublicCommentEgg
 *
 * @phpstan-type PublicMessageEggVariants = PublicConversationsMessageEgg|PublicCommentEgg
 * @phpstan-type PublicMessageEggShape = PublicMessageEggVariants|PublicConversationsMessageEggShape|PublicCommentEggShape
 */
final class PublicMessageEgg implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [PublicConversationsMessageEgg::class, PublicCommentEgg::class];
    }
}
