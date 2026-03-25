<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Get the existing objects types that belong to the specified media type.
 *
 * @see HubspotSDK\Services\Cms\MediaBridgeService::listObjectTypesByMediaType()
 *
 * @phpstan-type MediaBridgeListObjectTypesByMediaTypeParamsShape = array{
 *   appID: string, includeFullDefinition?: bool|null
 * }
 */
final class MediaBridgeListObjectTypesByMediaTypeParams implements BaseModel
{
    /** @use SdkModel<MediaBridgeListObjectTypesByMediaTypeParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $appID;

    #[Optional]
    public ?bool $includeFullDefinition;

    /**
     * `new MediaBridgeListObjectTypesByMediaTypeParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MediaBridgeListObjectTypesByMediaTypeParams::with(appID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MediaBridgeListObjectTypesByMediaTypeParams)->withAppID(...)
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
     */
    public static function with(
        string $appID,
        ?bool $includeFullDefinition = null
    ): self {
        $self = new self;

        $self['appID'] = $appID;

        null !== $includeFullDefinition && $self['includeFullDefinition'] = $includeFullDefinition;

        return $self;
    }

    public function withAppID(string $appID): self
    {
        $self = clone $this;
        $self['appID'] = $appID;

        return $self;
    }

    public function withIncludeFullDefinition(bool $includeFullDefinition): self
    {
        $self = clone $this;
        $self['includeFullDefinition'] = $includeFullDefinition;

        return $self;
    }
}
