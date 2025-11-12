<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels\PublicConversationsMessage;

use HubspotSDK\Conversations\PublicContact;
use HubspotSDK\Conversations\PublicFile;
use HubspotSDK\Conversations\PublicLocation;
use HubspotSDK\Conversations\PublicMessageHeader;
use HubspotSDK\Conversations\PublicQuickReplies;
use HubspotSDK\Conversations\PublicSocialMetadataAttachment;
use HubspotSDK\Conversations\PublicUnsupportedContent;
use HubspotSDK\Conversations\PublicWhatsAppTemplateMetadata;
use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

final class Attachment implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            PublicFile::class,
            PublicLocation::class,
            PublicContact::class,
            PublicUnsupportedContent::class,
            PublicMessageHeader::class,
            PublicQuickReplies::class,
            PublicWhatsAppTemplateMetadata::class,
            PublicSocialMetadataAttachment::class,
        ];
    }
}
