<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\Groups;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Get the property groups for a specified object type.
 *
 * @see HubspotSDK\Cms\MediaBridge\Groups->list
 *
 * @phpstan-type GroupListParamsShape = array{appID: string}
 */
final class GroupListParams implements BaseModel
{
    /** @use SdkModel<GroupListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $appID;

    /**
     * `new GroupListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * GroupListParams::with(appID: ...)
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
    public static function with(string $appID): self
    {
        $obj = new self;

        $obj->appID = $appID;

        return $obj;
    }

    public function withAppID(string $appID): self
    {
        $obj = clone $this;
        $obj->appID = $appID;

        return $obj;
    }
}
