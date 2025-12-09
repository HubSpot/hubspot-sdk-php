<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type GroupViewShape = array{
 *   displayName: string,
 *   displayOrder: int,
 *   fulcrumPortalID: int,
 *   fulcrumTimestamp: int,
 *   hubspotDefined: bool,
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

    #[Required]
    public bool $hubspotDefined;

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
     *   hubspotDefined: ...,
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
     *   ->withHubspotDefined(...)
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
        bool $hubspotDefined,
        string $name,
    ): self {
        $self = new self;

        $self['displayName'] = $displayName;
        $self['displayOrder'] = $displayOrder;
        $self['fulcrumPortalID'] = $fulcrumPortalID;
        $self['fulcrumTimestamp'] = $fulcrumTimestamp;
        $self['hubspotDefined'] = $hubspotDefined;
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

    public function withHubspotDefined(bool $hubspotDefined): self
    {
        $self = clone $this;
        $self['hubspotDefined'] = $hubspotDefined;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
