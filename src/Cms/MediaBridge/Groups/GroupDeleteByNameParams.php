<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\Groups;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Delete an existing property group by name.
 *
 * @see HubspotSDK\Services\Cms\MediaBridge\GroupsService::deleteByName()
 *
 * @phpstan-type GroupDeleteByNameParamsShape = array{
 *   appId: int, objectType: string
 * }
 */
final class GroupDeleteByNameParams implements BaseModel
{
    /** @use SdkModel<GroupDeleteByNameParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appId;

    #[Required]
    public string $objectType;

    /**
     * `new GroupDeleteByNameParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * GroupDeleteByNameParams::with(appId: ..., objectType: ...)
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
    public static function with(int $appId, string $objectType): self
    {
        $obj = new self;

        $obj['appId'] = $appId;
        $obj['objectType'] = $objectType;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj['appId'] = $appID;

        return $obj;
    }

    public function withObjectType(string $objectType): self
    {
        $obj = clone $this;
        $obj['objectType'] = $objectType;

        return $obj;
    }
}
