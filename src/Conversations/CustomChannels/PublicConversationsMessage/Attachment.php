<?php

declare(strict_types=1);

namespace HubSpotSDK\Conversations\CustomChannels\PublicConversationsMessage;

use HubSpotSDK\Conversations\CustomChannels\PublicContact;
use HubSpotSDK\Conversations\CustomChannels\PublicFile;
use HubSpotSDK\Conversations\CustomChannels\PublicLocation;
use HubSpotSDK\Conversations\CustomChannels\PublicMessageHeader;
use HubSpotSDK\Conversations\CustomChannels\PublicQuickReplies;
use HubSpotSDK\Conversations\CustomChannels\PublicSocialMetadataAttachment;
use HubSpotSDK\Conversations\CustomChannels\PublicUnsupportedContent;
use HubSpotSDK\Conversations\CustomChannels\PublicWhatsAppTemplateMetadata;
use HubSpotSDK\Core\Concerns\SdkUnion;
use HubSpotSDK\Core\Conversion\Contracts\Converter;
use HubSpotSDK\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-import-type PublicFileShape from \HubSpotSDK\Conversations\CustomChannels\PublicFile
 * @phpstan-import-type PublicLocationShape from \HubSpotSDK\Conversations\CustomChannels\PublicLocation
 * @phpstan-import-type PublicContactShape from \HubSpotSDK\Conversations\CustomChannels\PublicContact
 * @phpstan-import-type PublicUnsupportedContentShape from \HubSpotSDK\Conversations\CustomChannels\PublicUnsupportedContent
 * @phpstan-import-type PublicMessageHeaderShape from \HubSpotSDK\Conversations\CustomChannels\PublicMessageHeader
 * @phpstan-import-type PublicQuickRepliesShape from \HubSpotSDK\Conversations\CustomChannels\PublicQuickReplies
 * @phpstan-import-type PublicWhatsAppTemplateMetadataShape from \HubSpotSDK\Conversations\CustomChannels\PublicWhatsAppTemplateMetadata
 * @phpstan-import-type PublicSocialMetadataAttachmentShape from \HubSpotSDK\Conversations\CustomChannels\PublicSocialMetadataAttachment
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
