<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type GroupViewShape = array{
 *   displayName: string,
 *   displayOrder: int,
 *   fulcrumPortalId: int,
 *   fulcrumTimestamp: int,
 *   hubspotDefined: bool,
 *   name: string,
 * }
 */
final class GroupView implements BaseModel
{
    /** @use SdkModel<GroupViewShape> */
    use SdkModel;

    #[Api]
    public string $displayName;

    #[Api]
    public int $displayOrder;

    #[Api]
    public int $fulcrumPortalId;

    #[Api]
    public int $fulcrumTimestamp;

    #[Api]
    public bool $hubspotDefined;

    #[Api]
    public string $name;

    /**
     * `new GroupView()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * GroupView::with(
     *   displayName: ...,
     *   displayOrder: ...,
     *   fulcrumPortalId: ...,
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
        int $fulcrumPortalId,
        int $fulcrumTimestamp,
        bool $hubspotDefined,
        string $name,
    ): self {
        $obj = new self;

        $obj['displayName'] = $displayName;
        $obj['displayOrder'] = $displayOrder;
        $obj['fulcrumPortalId'] = $fulcrumPortalId;
        $obj['fulcrumTimestamp'] = $fulcrumTimestamp;
        $obj['hubspotDefined'] = $hubspotDefined;
        $obj['name'] = $name;

        return $obj;
    }

    public function withDisplayName(string $displayName): self
    {
        $obj = clone $this;
        $obj['displayName'] = $displayName;

        return $obj;
    }

    public function withDisplayOrder(int $displayOrder): self
    {
        $obj = clone $this;
        $obj['displayOrder'] = $displayOrder;

        return $obj;
    }

    public function withFulcrumPortalID(int $fulcrumPortalID): self
    {
        $obj = clone $this;
        $obj['fulcrumPortalId'] = $fulcrumPortalID;

        return $obj;
    }

    public function withFulcrumTimestamp(int $fulcrumTimestamp): self
    {
        $obj = clone $this;
        $obj['fulcrumTimestamp'] = $fulcrumTimestamp;

        return $obj;
    }

    public function withHubspotDefined(bool $hubspotDefined): self
    {
        $obj = clone $this;
        $obj['hubspotDefined'] = $hubspotDefined;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }
}
