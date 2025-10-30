<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type GroupShape = array{
 *   deleted: bool,
 *   displayName: string,
 *   displayOrder: int,
 *   fulcrumPortalID: int,
 *   fulcrumTimestamp: int,
 *   hubspotDefined: bool,
 *   name: string,
 *   portalID: int,
 * }
 */
final class Group implements BaseModel
{
    /** @use SdkModel<GroupShape> */
    use SdkModel;

    #[Api]
    public bool $deleted;

    #[Api]
    public string $displayName;

    #[Api]
    public int $displayOrder;

    #[Api('fulcrumPortalId')]
    public int $fulcrumPortalID;

    #[Api]
    public int $fulcrumTimestamp;

    #[Api]
    public bool $hubspotDefined;

    #[Api]
    public string $name;

    #[Api('portalId')]
    public int $portalID;

    /**
     * `new Group()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Group::with(
     *   deleted: ...,
     *   displayName: ...,
     *   displayOrder: ...,
     *   fulcrumPortalID: ...,
     *   fulcrumTimestamp: ...,
     *   hubspotDefined: ...,
     *   name: ...,
     *   portalID: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Group)
     *   ->withDeleted(...)
     *   ->withDisplayName(...)
     *   ->withDisplayOrder(...)
     *   ->withFulcrumPortalID(...)
     *   ->withFulcrumTimestamp(...)
     *   ->withHubspotDefined(...)
     *   ->withName(...)
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
        bool $deleted,
        string $displayName,
        int $displayOrder,
        int $fulcrumPortalID,
        int $fulcrumTimestamp,
        bool $hubspotDefined,
        string $name,
        int $portalID,
    ): self {
        $obj = new self;

        $obj->deleted = $deleted;
        $obj->displayName = $displayName;
        $obj->displayOrder = $displayOrder;
        $obj->fulcrumPortalID = $fulcrumPortalID;
        $obj->fulcrumTimestamp = $fulcrumTimestamp;
        $obj->hubspotDefined = $hubspotDefined;
        $obj->name = $name;
        $obj->portalID = $portalID;

        return $obj;
    }

    public function withDeleted(bool $deleted): self
    {
        $obj = clone $this;
        $obj->deleted = $deleted;

        return $obj;
    }

    public function withDisplayName(string $displayName): self
    {
        $obj = clone $this;
        $obj->displayName = $displayName;

        return $obj;
    }

    public function withDisplayOrder(int $displayOrder): self
    {
        $obj = clone $this;
        $obj->displayOrder = $displayOrder;

        return $obj;
    }

    public function withFulcrumPortalID(int $fulcrumPortalID): self
    {
        $obj = clone $this;
        $obj->fulcrumPortalID = $fulcrumPortalID;

        return $obj;
    }

    public function withFulcrumTimestamp(int $fulcrumTimestamp): self
    {
        $obj = clone $this;
        $obj->fulcrumTimestamp = $fulcrumTimestamp;

        return $obj;
    }

    public function withHubspotDefined(bool $hubspotDefined): self
    {
        $obj = clone $this;
        $obj->hubspotDefined = $hubspotDefined;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withPortalID(int $portalID): self
    {
        $obj = clone $this;
        $obj->portalID = $portalID;

        return $obj;
    }
}
