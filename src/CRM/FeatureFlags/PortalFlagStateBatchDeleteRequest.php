<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\FeatureFlags;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type portal_flag_state_batch_delete_request = array{
 *   portalIDs: list<int>
 * }
 */
final class PortalFlagStateBatchDeleteRequest implements BaseModel
{
    /** @use SdkModel<portal_flag_state_batch_delete_request> */
    use SdkModel;

    /** @var list<int> $portalIDs */
    #[Api('portalIds', list: 'int')]
    public array $portalIDs;

    /**
     * `new PortalFlagStateBatchDeleteRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PortalFlagStateBatchDeleteRequest::with(portalIDs: ...)
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
     * @param list<int> $portalIDs
     */
    public static function with(array $portalIDs): self
    {
        $obj = new self;

        $obj->portalIDs = $portalIDs;

        return $obj;
    }

    /**
     * @param list<int> $portalIDs
     */
    public function withPortalIDs(array $portalIDs): self
    {
        $obj = clone $this;
        $obj->portalIDs = $portalIDs;

        return $obj;
    }
}
