<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Cms\MediaBridge\MediaBridgeCreateObjectTypeParams\MediaType;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Create a new media object type.
 *
 * @see HubspotSDK\Services\Cms\MediaBridgeService::createObjectType()
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
