<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels\PublicConversationsMessage;

use HubspotSDK\Conversations\CustomChannels\PublicContact;
use HubspotSDK\Conversations\CustomChannels\PublicFile;
use HubspotSDK\Conversations\CustomChannels\PublicLocation;
use HubspotSDK\Conversations\CustomChannels\PublicMessageHeader;
use HubspotSDK\Conversations\CustomChannels\PublicQuickReplies;
use HubspotSDK\Conversations\CustomChannels\PublicSocialMetadataAttachment;
use HubspotSDK\Conversations\CustomChannels\PublicUnsupportedContent;
use HubspotSDK\Conversations\CustomChannels\PublicWhatsAppTemplateMetadata;
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
