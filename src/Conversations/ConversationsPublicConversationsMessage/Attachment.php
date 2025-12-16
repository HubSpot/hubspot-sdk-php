<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\ConversationsPublicConversationsMessage;

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

/**
 * @phpstan-import-type PublicFileShape from \HubspotSDK\Conversations\PublicFile
 * @phpstan-import-type PublicLocationShape from \HubspotSDK\Conversations\PublicLocation
 * @phpstan-import-type PublicContactShape from \HubspotSDK\Conversations\PublicContact
 * @phpstan-import-type PublicUnsupportedContentShape from \HubspotSDK\Conversations\PublicUnsupportedContent
 * @phpstan-import-type PublicMessageHeaderShape from \HubspotSDK\Conversations\PublicMessageHeader
 * @phpstan-import-type PublicQuickRepliesShape from \HubspotSDK\Conversations\PublicQuickReplies
 * @phpstan-import-type PublicWhatsAppTemplateMetadataShape from \HubspotSDK\Conversations\PublicWhatsAppTemplateMetadata
 * @phpstan-import-type PublicSocialMetadataAttachmentShape from \HubspotSDK\Conversations\PublicSocialMetadataAttachment
 *
 * @phpstan-type AttachmentShape = PublicFileShape|PublicLocationShape|PublicContactShape|PublicUnsupportedContentShape|PublicMessageHeaderShape|PublicQuickRepliesShape|PublicWhatsAppTemplateMetadataShape|PublicSocialMetadataAttachmentShape
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
