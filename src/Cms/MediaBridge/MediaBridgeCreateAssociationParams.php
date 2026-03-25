<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Create a new association definition for the specified object type.
 *
 * @see HubspotSDK\Services\Cms\MediaBridgeService::createAssociation()
 *
 * @phpstan-type MediaBridgeCreateAssociationParamsShape = array{
 *   appID: string,
 *   fromObjectTypeID: string,
 *   toObjectTypeID: string,
 *   name?: string|null,
 * }
 */
final class MediaBridgeCreateAssociationParams implements BaseModel
{
    /** @use SdkModel<MediaBridgeCreateAssociationParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $appID;

    #[Required('fromObjectTypeId')]
    public string $fromObjectTypeID;

    #[Required('toObjectTypeId')]
    public string $toObjectTypeID;

    #[Optional]
    public ?string $name;

    /**
     * `new MediaBridgeCreateAssociationParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MediaBridgeCreateAssociationParams::with(
     *   appID: ..., fromObjectTypeID: ..., toObjectTypeID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MediaBridgeCreateAssociationParams)
     *   ->withAppID(...)
     *   ->withFromObjectTypeID(...)
     *   ->withToObjectTypeID(...)
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
        string $fromObjectTypeID,
        string $toObjectTypeID,
        ?string $name = null,
    ): self {
        $self = new self;

        $self['appID'] = $appID;
        $self['fromObjectTypeID'] = $fromObjectTypeID;
        $self['toObjectTypeID'] = $toObjectTypeID;

        null !== $name && $self['name'] = $name;

        return $self;
    }

    public function withAppID(string $appID): self
    {
        $self = clone $this;
        $self['appID'] = $appID;

        return $self;
    }

    public function withFromObjectTypeID(string $fromObjectTypeID): self
    {
        $self = clone $this;
        $self['fromObjectTypeID'] = $fromObjectTypeID;

        return $self;
    }

    public function withToObjectTypeID(string $toObjectTypeID): self
    {
        $self = clone $this;
        $self['toObjectTypeID'] = $toObjectTypeID;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
