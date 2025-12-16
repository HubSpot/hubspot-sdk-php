<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\PublicConversationsMessageEgg;

use HubspotSDK\Conversations\PublicFileEgg;
use HubspotSDK\Conversations\PublicQuickRepliesEgg;
use HubspotSDK\Conversations\PublicSocialMediaEgg;
use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-import-type PublicFileEggShape from \HubspotSDK\Conversations\PublicFileEgg
 * @phpstan-import-type PublicQuickRepliesEggShape from \HubspotSDK\Conversations\PublicQuickRepliesEgg
 * @phpstan-import-type PublicSocialMediaEggShape from \HubspotSDK\Conversations\PublicSocialMediaEgg
 *
 * @phpstan-type AttachmentShape = PublicFileEggShape|PublicQuickRepliesEggShape|PublicSocialMediaEggShape
 */
final class Attachment implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            PublicFileEgg::class,
            PublicQuickRepliesEgg::class,
            PublicSocialMediaEgg::class,
        ];
    }
}
