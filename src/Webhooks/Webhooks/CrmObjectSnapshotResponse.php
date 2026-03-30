<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks\Webhooks;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type CrmObjectSnapshotResponseShape = array{
 *   objectID: int, objectTypeID: string, portalID: int, snapshotStatusID: string
 * }
 */
final class CrmObjectSnapshotResponse implements BaseModel
{
    /** @use SdkModel<CrmObjectSnapshotResponseShape> */
    use SdkModel;

    #[Required('objectId')]
    public int $objectID;

    #[Required('objectTypeId')]
    public string $objectTypeID;

    #[Required('portalId')]
    public int $portalID;

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

    public function withSnapshotStatusID(string $snapshotStatusID): self
    {
        $self = clone $this;
        $self['snapshotStatusID'] = $snapshotStatusID;

        return $self;
    }
}
