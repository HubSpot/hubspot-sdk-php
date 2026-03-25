<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-import-type UpdateVideoObjectRequestShape from \HubspotSDK\Cms\MediaBridge\UpdateVideoObjectRequest
 * @phpstan-import-type UpdateOtherObjectRequestShape from \HubspotSDK\Cms\MediaBridge\UpdateOtherObjectRequest
 * @phpstan-import-type UpdateAudioObjectRequestShape from \HubspotSDK\Cms\MediaBridge\UpdateAudioObjectRequest
 * @phpstan-import-type UpdateImageObjectRequestShape from \HubspotSDK\Cms\MediaBridge\UpdateImageObjectRequest
 * @phpstan-import-type UpdateDocumentObjectRequestShape from \HubspotSDK\Cms\MediaBridge\UpdateDocumentObjectRequest
 *
 * @phpstan-type UpdateMBObjectRequestVariants = UpdateVideoObjectRequest|UpdateOtherObjectRequest|UpdateAudioObjectRequest|UpdateImageObjectRequest|UpdateDocumentObjectRequest
 * @phpstan-type UpdateMBObjectRequestShape = UpdateMBObjectRequestVariants|UpdateVideoObjectRequestShape|UpdateOtherObjectRequestShape|UpdateAudioObjectRequestShape|UpdateImageObjectRequestShape|UpdateDocumentObjectRequestShape
 */
final class UpdateMBObjectRequest implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            UpdateVideoObjectRequest::class,
            UpdateOtherObjectRequest::class,
            UpdateAudioObjectRequest::class,
            UpdateImageObjectRequest::class,
            UpdateDocumentObjectRequest::class,
        ];
    }
}
