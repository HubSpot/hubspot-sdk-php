<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels\ChannelIntegrationMessageEgg;

use HubspotSDK\Conversations\CustomChannels\ContactAttachment;
use HubspotSDK\Conversations\CustomChannels\FileAttachment;
use HubspotSDK\Conversations\CustomChannels\LocationAttachment;
use HubspotSDK\Conversations\CustomChannels\MessageHeaderAttachment;
use HubspotSDK\Conversations\CustomChannels\QuickRepliesAttachment;
use HubspotSDK\Conversations\CustomChannels\SocialMetadataIntegrationAttachment;
use HubspotSDK\Conversations\CustomChannels\UnsupportedContentAttachment;
use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-import-type FileAttachmentShape from \HubspotSDK\Conversations\CustomChannels\FileAttachment
 * @phpstan-import-type LocationAttachmentShape from \HubspotSDK\Conversations\CustomChannels\LocationAttachment
 * @phpstan-import-type ContactAttachmentShape from \HubspotSDK\Conversations\CustomChannels\ContactAttachment
 * @phpstan-import-type UnsupportedContentAttachmentShape from \HubspotSDK\Conversations\CustomChannels\UnsupportedContentAttachment
 * @phpstan-import-type MessageHeaderAttachmentShape from \HubspotSDK\Conversations\CustomChannels\MessageHeaderAttachment
 * @phpstan-import-type QuickRepliesAttachmentShape from \HubspotSDK\Conversations\CustomChannels\QuickRepliesAttachment
 * @phpstan-import-type SocialMetadataIntegrationAttachmentShape from \HubspotSDK\Conversations\CustomChannels\SocialMetadataIntegrationAttachment
 *
 * @phpstan-type AttachmentShape = FileAttachmentShape|LocationAttachmentShape|ContactAttachmentShape|UnsupportedContentAttachmentShape|MessageHeaderAttachmentShape|QuickRepliesAttachmentShape|SocialMetadataIntegrationAttachmentShape
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
            FileAttachment::class,
            LocationAttachment::class,
            ContactAttachment::class,
            UnsupportedContentAttachment::class,
            MessageHeaderAttachment::class,
            QuickRepliesAttachment::class,
            SocialMetadataIntegrationAttachment::class,
        ];
    }
}
