<?php

declare(strict_types=1);

namespace HubSpotSDK\Webhooks;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type CrmObjectSnapshotResponseShape = array{
 *   objectID: int, objectTypeID: string, portalID: int, snapshotStatusID: string
 * }
 */
final class CrmObjectSnapshotResponse implements BaseModel
{
    /** @use SdkModel<CrmObjectSnapshotResponseShape> */
    use SdkModel;

    /**
     * An integer representing the unique identifier of the CRM object for which the snapshot is taken.
     */
    #[Required('objectId')]
    public int $objectID;

    /**
     * A string indicating the type of the CRM object, such as contact, company, or deal.
     */
    #[Required('objectTypeId')]
    public string $objectTypeID;

    /**
     * An integer representing the unique identifier of the HubSpot portal associated with the CRM object.
     */
    #[Required('portalId')]
    public int $portalID;

    /**
     * A UUID string representing the status identifier of the snapshot request, indicating the current state of the snapshot process.
     */
    #[Required('snapshotStatusId')]
    public string $snapshotStatusID;

    /**
     * `new CrmObjectSnapshotResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CrmObjectSnapshotResponse::with(
     *   objectID: ..., objectTypeID: ..., portalID: ..., snapshotStatusID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CrmObjectSnapshotResponse)
     *   ->withObjectID(...)
     *   ->withObjectTypeID(...)
     *   ->withPortalID(...)
     *   ->withSnapshotStatusID(...)
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
        int $portalID,
        string $snapshotStatusID
    ): self {
        $self = new self;

        $self['objectID'] = $objectID;
        $self['objectTypeID'] = $objectTypeID;
        $self['portalID'] = $portalID;
        $self['snapshotStatusID'] = $snapshotStatusID;

        return $self;
    }

    /**
     * An integer representing the unique identifier of the CRM object for which the snapshot is taken.
     */
    public function withObjectID(int $objectID): self
    {
        $self = clone $this;
        $self['objectID'] = $objectID;

        return $self;
    }

    /**
     * A string indicating the type of the CRM object, such as contact, company, or deal.
     */
    public function withObjectTypeID(string $objectTypeID): self
    {
        $self = clone $this;
        $self['objectTypeID'] = $objectTypeID;

        return $self;
    }

    /**
     * An integer representing the unique identifier of the HubSpot portal associated with the CRM object.
     */
    public function withPortalID(int $portalID): self
    {
        $self = clone $this;
        $self['portalID'] = $portalID;

        return $self;
    }

    /**
     * A UUID string representing the status identifier of the snapshot request, indicating the current state of the snapshot process.
     */
    public function withSnapshotStatusID(string $snapshotStatusID): self
    {
        $self = clone $this;
        $self['snapshotStatusID'] = $snapshotStatusID;

        return $self;
    }
}
