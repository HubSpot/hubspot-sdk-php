<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\Groups;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Update an existing property group by name.
 *
 * @see HubspotSDK\Cms\MediaBridge\Groups->updateByName
 *
 * @phpstan-type group_update_by_name_params = array{
 *   appID: string, objectType: string, displayOrder?: int, label?: string
 * }
 */
final class GroupUpdateByNameParams implements BaseModel
{
    /** @use SdkModel<group_update_by_name_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $appID;

    #[Api]
    public string $objectType;

    #[Api(optional: true)]
    public ?int $displayOrder;

    #[Api(optional: true)]
    public ?string $label;

    /**
     * `new GroupUpdateByNameParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * GroupUpdateByNameParams::with(appID: ..., objectType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new GroupUpdateByNameParams)->withAppID(...)->withObjectType(...)
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
        string $appID,
        string $objectType,
        ?int $displayOrder = null,
        ?string $label = null,
    ): self {
        $obj = new self;

        $obj->appID = $appID;
        $obj->objectType = $objectType;

        null !== $displayOrder && $obj->displayOrder = $displayOrder;
        null !== $label && $obj->label = $label;

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

    public function withDisplayOrder(int $displayOrder): self
    {
        $obj = clone $this;
        $obj->displayOrder = $displayOrder;

        return $obj;
    }

    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj->label = $label;

        return $obj;
    }
}
