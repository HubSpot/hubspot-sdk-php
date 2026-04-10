<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge;

use HubSpotSDK\Cms\MediaBridge\MediaBridgeCreateObjectTypeParams\MediaType;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Create a new media object type.
 *
 * @see HubSpotSDK\Services\Cms\MediaBridgeService::createObjectType()
 *
 * @phpstan-type MediaBridgeCreateObjectTypeParamsShape = array{
 *   mediaTypes: list<MediaType|value-of<MediaType>>
 * }
 */
final class MediaBridgeCreateObjectTypeParams implements BaseModel
{
    /** @use SdkModel<MediaBridgeCreateObjectTypeParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<value-of<MediaType>> $mediaTypes */
    #[Required(list: MediaType::class)]
    public array $mediaTypes;

    /**
     * `new MediaBridgeCreateObjectTypeParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MediaBridgeCreateObjectTypeParams::with(mediaTypes: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MediaBridgeCreateObjectTypeParams)->withMediaTypes(...)
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
     * @param list<MediaType|value-of<MediaType>> $mediaTypes
     */
    public static function with(array $mediaTypes): self
    {
        $self = new self;

        $self['mediaTypes'] = $mediaTypes;

        return $self;
    }

    /**
     * @param list<MediaType|value-of<MediaType>> $mediaTypes
     */
    public function withMediaTypes(array $mediaTypes): self
    {
        $self = clone $this;
        $self['mediaTypes'] = $mediaTypes;

        return $self;
    }
}
