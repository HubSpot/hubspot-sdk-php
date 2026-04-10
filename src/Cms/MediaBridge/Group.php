<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type GroupShape = array{
 *   deleted: bool,
 *   displayName: string,
 *   displayOrder: int,
 *   fulcrumPortalID: int,
 *   fulcrumTimestamp: int,
 *   hubSpotDefined: bool,
 *   name: string,
 *   portalID: int,
 * }
 */
final class Group implements BaseModel
{
    /** @use SdkModel<GroupShape> */
    use SdkModel;

    #[Required]
    public bool $deleted;

    #[Required]
    public string $displayName;

    #[Required]
    public int $displayOrder;

    #[Required('fulcrumPortalId')]
    public int $fulcrumPortalID;

    #[Required]
    public int $fulcrumTimestamp;

    #[Required('hubspotDefined')]
    public bool $hubSpotDefined;

    #[Required]
    public string $name;

    #[Required('portalId')]
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
     *   hubSpotDefined: ...,
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
     *   ->withHubSpotDefined(...)
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
        bool $hubSpotDefined,
        string $name,
        int $portalID,
    ): self {
        $self = new self;

        $self['deleted'] = $deleted;
        $self['displayName'] = $displayName;
        $self['displayOrder'] = $displayOrder;
        $self['fulcrumPortalID'] = $fulcrumPortalID;
        $self['fulcrumTimestamp'] = $fulcrumTimestamp;
        $self['hubSpotDefined'] = $hubSpotDefined;
        $self['name'] = $name;
        $self['portalID'] = $portalID;

        return $self;
    }

    public function withDeleted(bool $deleted): self
    {
        $self = clone $this;
        $self['deleted'] = $deleted;

        return $self;
    }

    public function withDisplayName(string $displayName): self
    {
        $self = clone $this;
        $self['displayName'] = $displayName;

        return $self;
    }

    public function withDisplayOrder(int $displayOrder): self
    {
        $self = clone $this;
        $self['displayOrder'] = $displayOrder;

        return $self;
    }

    public function withFulcrumPortalID(int $fulcrumPortalID): self
    {
        $self = clone $this;
        $self['fulcrumPortalID'] = $fulcrumPortalID;

        return $self;
    }

    public function withFulcrumTimestamp(int $fulcrumTimestamp): self
    {
        $self = clone $this;
        $self['fulcrumTimestamp'] = $fulcrumTimestamp;

        return $self;
    }

    public function withHubSpotDefined(bool $hubSpotDefined): self
    {
        $self = clone $this;
        $self['hubSpotDefined'] = $hubSpotDefined;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withPortalID(int $portalID): self
    {
        $self = clone $this;
        $self['portalID'] = $portalID;

        return $self;
    }
}
