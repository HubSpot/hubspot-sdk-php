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

    /**
     * The unique identifier for the object.
     */
    #[Required('objectId')]
    public int $objectID;

    /**
     * The type identifier for the object.
     */
    #[Required('objectTypeId')]
    public string $objectTypeID;

    /**
     * The unique identifier for the portal.
     */
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

    /**
     * The unique identifier for the object.
     */
    public function withObjectID(int $objectID): self
    {
        $self = clone $this;
        $self['objectID'] = $objectID;

        return $self;
    }

    /**
     * The type identifier for the object.
     */
    public function withObjectTypeID(string $objectTypeID): self
    {
        $self = clone $this;
        $self['objectTypeID'] = $objectTypeID;

        return $self;
    }

    /**
     * The unique identifier for the portal.
     */
    public function withPortalID(int $portalID): self
    {
        $self = clone $this;
        $self['portalID'] = $portalID;

        return $self;
    }
}
