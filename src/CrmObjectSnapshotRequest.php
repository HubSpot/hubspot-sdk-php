<?php

declare(strict_types=1);

namespace HubSpotSDK;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type CrmObjectSnapshotRequestShape = array{
 *   objectID: int, objectTypeID: string, portalID: int, properties: list<string>
 * }
 */
final class CrmObjectSnapshotRequest implements BaseModel
{
    /** @use SdkModel<CrmObjectSnapshotRequestShape> */
    use SdkModel;

    /**
     * An integer representing the unique identifier of the CRM object for which the snapshot is requested.
     */
    #[Required('objectId')]
    public int $objectID;

    /**
     * A string representing the type identifier of the CRM object, specifying what kind of object it is within HubSpot.
     */
    #[Required('objectTypeId')]
    public string $objectTypeID;

    /**
     * An integer representing the unique identifier of the HubSpot account (portal) where the CRM object resides.
     */
    #[Required('portalId')]
    public int $portalID;

    /**
     * An array of strings, each representing a property of the CRM object that should be included in the snapshot.
     *
     * @var list<string> $properties
     */
    #[Required(list: 'string')]
    public array $properties;

    /**
     * `new CrmObjectSnapshotRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CrmObjectSnapshotRequest::with(
     *   objectID: ..., objectTypeID: ..., portalID: ..., properties: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CrmObjectSnapshotRequest)
     *   ->withObjectID(...)
     *   ->withObjectTypeID(...)
     *   ->withPortalID(...)
     *   ->withProperties(...)
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
     * @param list<string> $properties
     */
    public static function with(
        int $objectID,
        string $objectTypeID,
        int $portalID,
        array $properties
    ): self {
        $self = new self;

        $self['objectID'] = $objectID;
        $self['objectTypeID'] = $objectTypeID;
        $self['portalID'] = $portalID;
        $self['properties'] = $properties;

        return $self;
    }

    /**
     * An integer representing the unique identifier of the CRM object for which the snapshot is requested.
     */
    public function withObjectID(int $objectID): self
    {
        $self = clone $this;
        $self['objectID'] = $objectID;

        return $self;
    }

    /**
     * A string representing the type identifier of the CRM object, specifying what kind of object it is within HubSpot.
     */
    public function withObjectTypeID(string $objectTypeID): self
    {
        $self = clone $this;
        $self['objectTypeID'] = $objectTypeID;

        return $self;
    }

    /**
     * An integer representing the unique identifier of the HubSpot account (portal) where the CRM object resides.
     */
    public function withPortalID(int $portalID): self
    {
        $self = clone $this;
        $self['portalID'] = $portalID;

        return $self;
    }

    /**
     * An array of strings, each representing a property of the CRM object that should be included in the snapshot.
     *
     * @param list<string> $properties
     */
    public function withProperties(array $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }
}
