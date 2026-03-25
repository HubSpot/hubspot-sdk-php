<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Cms\MediaBridge\MediaBridgeGetParams\MediaType;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Cms\MediaBridgeService::get()
 *
 * @phpstan-type MediaBridgeGetParamsShape = array{
 *   mediaType: MediaType|value-of<MediaType>
 * }
 */
final class MediaBridgeGetParams implements BaseModel
{
    /** @use SdkModel<MediaBridgeGetParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var value-of<MediaType> $mediaType */
    #[Required(enum: MediaType::class)]
    public string $mediaType;

    /**
     * `new MediaBridgeGetParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MediaBridgeGetParams::with(mediaType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MediaBridgeGetParams)->withMediaType(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param MediaType|value-of<MediaType> $mediaType
     */
    public static function with(MediaType|string $mediaType): self
    {
        $self = new self;

        $self['mediaType'] = $mediaType;

        return $self;
    }

    /**
     * @param MediaType|value-of<MediaType> $mediaType
     */
    public function withMediaType(MediaType|string $mediaType): self
    {
        $self = clone $this;
        $self['mediaType'] = $mediaType;

        return $self;
    }
}
