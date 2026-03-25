<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Calling;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ObjectCoordinatesShape = array{
 *   objectID: int, objectTypeID: string, portalID: int
 * }
 */
final class ObjectCoordinates implements BaseModel
{
    /** @use SdkModel<ObjectCoordinatesShape> */
    use SdkModel;

    #[Required('objectId')]
    public int $objectID;

    #[Required('objectTypeId')]
    public string $objectTypeID;

    #[Required('portalId')]
    public int $portalID;

    /**
     * `new ObjectCoordinates()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ObjectCoordinates::with(objectID: ..., objectTypeID: ..., portalID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ObjectCoordinates)
     *   ->withObjectID(...)
     *   ->withObjectTypeID(...)
     *   ->withPortalID(...)
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
        int $objectID,
        string $objectTypeID,
        int $portalID
    ): self {
        $self = new self;

        $self['objectID'] = $objectID;
        $self['objectTypeID'] = $objectTypeID;
        $self['portalID'] = $portalID;

        return $self;
    }

    public function withObjectID(int $objectID): self
    {
        $self = clone $this;
        $self['objectID'] = $objectID;

        return $self;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $self = clone $this;
        $self['objectTypeID'] = $objectTypeID;

        return $self;
    }

    public function withPortalID(int $portalID): self
    {
        $self = clone $this;
        $self['portalID'] = $portalID;

        return $self;
    }
}
