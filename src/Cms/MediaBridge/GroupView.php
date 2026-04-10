<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type GroupViewShape = array{
 *   displayName: string,
 *   displayOrder: int,
 *   fulcrumPortalID: int,
 *   fulcrumTimestamp: int,
 *   hubSpotDefined: bool,
 *   name: string,
 * }
 */
final class GroupView implements BaseModel
{
    /** @use SdkModel<GroupViewShape> */
    use SdkModel;

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

    /**
     * `new GroupView()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * GroupView::with(
     *   displayName: ...,
     *   displayOrder: ...,
     *   fulcrumPortalID: ...,
     *   fulcrumTimestamp: ...,
     *   hubSpotDefined: ...,
     *   name: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new GroupView)
     *   ->withDisplayName(...)
     *   ->withDisplayOrder(...)
     *   ->withFulcrumPortalID(...)
     *   ->withFulcrumTimestamp(...)
     *   ->withHubSpotDefined(...)
     *   ->withName(...)
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
        string $displayName,
        int $displayOrder,
        int $fulcrumPortalID,
        int $fulcrumTimestamp,
        bool $hubSpotDefined,
        string $name,
    ): self {
        $self = new self;

        $self['displayName'] = $displayName;
        $self['displayOrder'] = $displayOrder;
        $self['fulcrumPortalID'] = $fulcrumPortalID;
        $self['fulcrumTimestamp'] = $fulcrumTimestamp;
        $self['hubSpotDefined'] = $hubSpotDefined;
        $self['name'] = $name;

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
}
