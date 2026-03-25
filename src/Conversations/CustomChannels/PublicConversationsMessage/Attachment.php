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

/**
 * @phpstan-import-type PublicFileShape from \HubspotSDK\Conversations\CustomChannels\PublicFile
 * @phpstan-import-type PublicLocationShape from \HubspotSDK\Conversations\CustomChannels\PublicLocation
 * @phpstan-import-type PublicContactShape from \HubspotSDK\Conversations\CustomChannels\PublicContact
 * @phpstan-import-type PublicUnsupportedContentShape from \HubspotSDK\Conversations\CustomChannels\PublicUnsupportedContent
 * @phpstan-import-type PublicMessageHeaderShape from \HubspotSDK\Conversations\CustomChannels\PublicMessageHeader
 * @phpstan-import-type PublicQuickRepliesShape from \HubspotSDK\Conversations\CustomChannels\PublicQuickReplies
 * @phpstan-import-type PublicWhatsAppTemplateMetadataShape from \HubspotSDK\Conversations\CustomChannels\PublicWhatsAppTemplateMetadata
 * @phpstan-import-type PublicSocialMetadataAttachmentShape from \HubspotSDK\Conversations\CustomChannels\PublicSocialMetadataAttachment
 *
 * @phpstan-type AttachmentVariants = PublicFile|PublicLocation|PublicContact|PublicUnsupportedContent|PublicMessageHeader|PublicQuickReplies|PublicWhatsAppTemplateMetadata|PublicSocialMetadataAttachment
 * @phpstan-type AttachmentShape = AttachmentVariants|PublicFileShape|PublicLocationShape|PublicContactShape|PublicUnsupportedContentShape|PublicMessageHeaderShape|PublicQuickRepliesShape|PublicWhatsAppTemplateMetadataShape|PublicSocialMetadataAttachmentShape
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
