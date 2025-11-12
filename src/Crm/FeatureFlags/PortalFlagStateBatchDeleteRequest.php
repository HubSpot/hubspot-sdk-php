<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\FeatureFlags;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PortalFlagStateBatchDeleteRequestShape = array{
 *   portalIds: list<int>
 * }
 */
final class PortalFlagStateBatchDeleteRequest implements BaseModel
{
    /** @use SdkModel<PortalFlagStateBatchDeleteRequestShape> */
    use SdkModel;

    /** @var list<int> $portalIds */
    #[Api(list: 'int')]
    public array $portalIds;

    /**
     * `new PortalFlagStateBatchDeleteRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PortalFlagStateBatchDeleteRequest::with(portalIds: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PortalFlagStateBatchDeleteRequest)->withPortalIDs(...)
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
     * @param list<int> $portalIds
     */
    public static function with(array $portalIds): self
    {
        $obj = new self;

        $obj->portalIds = $portalIds;

        return $obj;
    }

    /**
     * @param list<int> $portalIDs
     */
    public function withPortalIDs(array $portalIDs): self
    {
        $obj = clone $this;
        $obj->portalIds = $portalIDs;

        return $obj;
    }
}
