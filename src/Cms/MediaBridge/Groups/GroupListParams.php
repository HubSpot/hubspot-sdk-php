<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\Groups;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Get the property groups for a specified object type.
 *
 * @see HubspotSDK\Services\Cms\MediaBridge\GroupsService::list()
 *
 * @phpstan-type GroupListParamsShape = array{appId: int}
 */
final class GroupListParams implements BaseModel
{
    /** @use SdkModel<GroupListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appId;

    /**
     * `new GroupListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * GroupListParams::with(appId: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new GroupListParams)->withAppID(...)
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
    public static function with(int $appId): self
    {
        $obj = new self;

        $obj['appId'] = $appId;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj['appId'] = $appID;

        return $obj;
    }
}
