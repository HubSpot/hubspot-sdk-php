<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-import-type CreateVideoObjectRequestShape from \HubspotSDK\Cms\MediaBridge\CreateVideoObjectRequest
 * @phpstan-import-type CreateOtherObjectRequestShape from \HubspotSDK\Cms\MediaBridge\CreateOtherObjectRequest
 * @phpstan-import-type CreateAudioObjectRequestShape from \HubspotSDK\Cms\MediaBridge\CreateAudioObjectRequest
 * @phpstan-import-type CreateImageObjectRequestShape from \HubspotSDK\Cms\MediaBridge\CreateImageObjectRequest
 * @phpstan-import-type CreateDocumentObjectRequestShape from \HubspotSDK\Cms\MediaBridge\CreateDocumentObjectRequest
 *
 * @phpstan-type CreateMBObjectRequestVariants = CreateVideoObjectRequest|CreateOtherObjectRequest|CreateAudioObjectRequest|CreateImageObjectRequest|CreateDocumentObjectRequest
 * @phpstan-type CreateMBObjectRequestShape = CreateMBObjectRequestVariants|CreateVideoObjectRequestShape|CreateOtherObjectRequestShape|CreateAudioObjectRequestShape|CreateImageObjectRequestShape|CreateDocumentObjectRequestShape
 */
final class CreateMBObjectRequest implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            CreateVideoObjectRequest::class,
            CreateOtherObjectRequest::class,
            CreateAudioObjectRequest::class,
            CreateImageObjectRequest::class,
            CreateDocumentObjectRequest::class,
        ];
    }
}
