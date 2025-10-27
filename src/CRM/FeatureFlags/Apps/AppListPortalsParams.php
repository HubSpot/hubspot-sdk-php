<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\FeatureFlags\Apps;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve a list of HubSpot accounts with an account-level flag setting for the specified app. No request body is included.
 *
 * @see HubspotSDK\CRM\FeatureFlags\Apps->listPortals
 *
 * @phpstan-type app_list_portals_params = array{
 *   appID: int, limit?: int, startPortalID?: int
 * }
 */
final class AppListPortalsParams implements BaseModel
{
    /** @use SdkModel<app_list_portals_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public int $appID;

    /**
     * The maximum number of results to return in a single request.
     */
    #[Api(optional: true)]
    public ?int $limit;

    /**
     * The initial account ID for listing, enabling pagination.
     */
    #[Api(optional: true)]
    public ?int $startPortalID;

    /**
     * `new AppListPortalsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AppListPortalsParams::with(appID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AppListPortalsParams)->withAppID(...)
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
        int $appID,
        ?int $limit = null,
        ?int $startPortalID = null
    ): self {
        $obj = new self;

        $obj->appID = $appID;

        null !== $limit && $obj->limit = $limit;
        null !== $startPortalID && $obj->startPortalID = $startPortalID;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj->appID = $appID;

        return $obj;
    }

    /**
     * The maximum number of results to return in a single request.
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj->limit = $limit;

        return $obj;
    }

    /**
     * The initial account ID for listing, enabling pagination.
     */
    public function withStartPortalID(int $startPortalID): self
    {
        $obj = clone $this;
        $obj->startPortalID = $startPortalID;

        return $obj;
    }
}
