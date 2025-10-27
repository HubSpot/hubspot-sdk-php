<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\Groups;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Delete an existing property group by name.
 *
 * @see HubspotSDK\Cms\MediaBridge\Groups->deleteByName
 *
 * @phpstan-type group_delete_by_name_params = array{
 *   appID: string, objectType: string
 * }
 */
final class GroupDeleteByNameParams implements BaseModel
{
    /** @use SdkModel<group_delete_by_name_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $appID;

    #[Api]
    public string $objectType;

    /**
     * `new GroupDeleteByNameParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * GroupDeleteByNameParams::with(appID: ..., objectType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new GroupDeleteByNameParams)->withAppID(...)->withObjectType(...)
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
    public static function with(string $appID, string $objectType): self
    {
        $obj = new self;

        $obj->appID = $appID;
        $obj->objectType = $objectType;

        return $obj;
    }

    public function withAppID(string $appID): self
    {
        $obj = clone $this;
        $obj->appID = $appID;

        return $obj;
    }

    public function withObjectType(string $objectType): self
    {
        $obj = clone $this;
        $obj->objectType = $objectType;

        return $obj;
    }
}
