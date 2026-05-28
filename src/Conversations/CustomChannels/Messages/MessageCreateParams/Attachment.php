<?php

declare(strict_types=1);

namespace HubSpotSDK\Conversations\CustomChannels\Messages\MessageCreateParams;

use HubSpotSDK\Conversations\CustomChannels\ContactAttachment;
use HubSpotSDK\Conversations\CustomChannels\FileAttachment;
use HubSpotSDK\Conversations\CustomChannels\LocationAttachment;
use HubSpotSDK\Conversations\CustomChannels\MessageHeaderAttachment;
use HubSpotSDK\Conversations\CustomChannels\QuickRepliesAttachment;
use HubSpotSDK\Conversations\CustomChannels\SocialMetadataIntegrationAttachment;
use HubSpotSDK\Conversations\CustomChannels\UnsupportedContentAttachment;
use HubSpotSDK\Core\Concerns\SdkUnion;
use HubSpotSDK\Core\Conversion\Contracts\Converter;
use HubSpotSDK\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-import-type FileAttachmentShape from \HubSpotSDK\Conversations\CustomChannels\FileAttachment
 * @phpstan-import-type LocationAttachmentShape from \HubSpotSDK\Conversations\CustomChannels\LocationAttachment
 * @phpstan-import-type ContactAttachmentShape from \HubSpotSDK\Conversations\CustomChannels\ContactAttachment
 * @phpstan-import-type UnsupportedContentAttachmentShape from \HubSpotSDK\Conversations\CustomChannels\UnsupportedContentAttachment
 * @phpstan-import-type MessageHeaderAttachmentShape from \HubSpotSDK\Conversations\CustomChannels\MessageHeaderAttachment
 * @phpstan-import-type QuickRepliesAttachmentShape from \HubSpotSDK\Conversations\CustomChannels\QuickRepliesAttachment
 * @phpstan-import-type SocialMetadataIntegrationAttachmentShape from \HubSpotSDK\Conversations\CustomChannels\SocialMetadataIntegrationAttachment
 *
 * @phpstan-type AttachmentVariants = FileAttachment|LocationAttachment|ContactAttachment|UnsupportedContentAttachment|MessageHeaderAttachment|QuickRepliesAttachment|SocialMetadataIntegrationAttachment
 * @phpstan-type AttachmentShape = AttachmentVariants|FileAttachmentShape|LocationAttachmentShape|ContactAttachmentShape|UnsupportedContentAttachmentShape|MessageHeaderAttachmentShape|QuickRepliesAttachmentShape|SocialMetadataIntegrationAttachmentShape
 */
final class Attachment implements ConverterSource
{
    use SdkUnion;

    public static function discriminator(): string
    {
        return 'type';
    }

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            'FILE' => FileAttachment::class,
            'LOCATION' => LocationAttachment::class,
            'CONTACT' => ContactAttachment::class,
            'UNSUPPORTED_CONTENT' => UnsupportedContentAttachment::class,
            'MESSAGE_HEADER' => MessageHeaderAttachment::class,
            'QUICK_REPLIES' => QuickRepliesAttachment::class,
            'SOCIAL_MEDIA_METADATA' => SocialMetadataIntegrationAttachment::class,
        ];
    }
}
