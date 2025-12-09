<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\FeatureFlags\Apps;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve a list of HubSpot accounts with an account-level flag setting for the specified app. No request body is included.
 *
 * @see HubspotSDK\Services\Crm\FeatureFlags\AppsService::listPortals()
 *
 * @phpstan-type AppListPortalsParamsShape = array{
 *   appID: int, limit?: int, startPortalID?: int
 * }
 */
final class AppListPortalsParams implements BaseModel
{
    /** @use SdkModel<AppListPortalsParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    /**
     * The maximum number of results to return in a single request.
     */
    #[Optional]
    public ?int $limit;

    /**
     * The initial account ID for listing, enabling pagination.
     */
    #[Optional]
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

        $obj['appID'] = $appID;

        null !== $limit && $obj['limit'] = $limit;
        null !== $startPortalID && $obj['startPortalID'] = $startPortalID;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj['appID'] = $appID;

        return $obj;
    }

    /**
     * The maximum number of results to return in a single request.
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj['limit'] = $limit;

        return $obj;
    }

    /**
     * The initial account ID for listing, enabling pagination.
     */
    public function withStartPortalID(int $startPortalID): self
    {
        $obj = clone $this;
        $obj['startPortalID'] = $startPortalID;

        return $obj;
    }
}
