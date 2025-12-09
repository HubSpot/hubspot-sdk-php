<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\Groups;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Update an existing property group by name.
 *
 * @see HubspotSDK\Services\Cms\MediaBridge\GroupsService::updateByName()
 *
 * @phpstan-type GroupUpdateByNameParamsShape = array{
 *   appId: int, objectType: string, displayOrder?: int, label?: string
 * }
 */
final class GroupUpdateByNameParams implements BaseModel
{
    /** @use SdkModel<GroupUpdateByNameParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appId;

    #[Required]
    public string $objectType;

    #[Optional]
    public ?int $displayOrder;

    #[Optional]
    public ?string $label;

    /**
     * `new GroupUpdateByNameParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * GroupUpdateByNameParams::with(appId: ..., objectType: ...)
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
        int $appId,
        string $objectType,
        ?int $displayOrder = null,
        ?string $label = null,
    ): self {
        $obj = new self;

        $obj['appId'] = $appId;
        $obj['objectType'] = $objectType;

        null !== $displayOrder && $obj['displayOrder'] = $displayOrder;
        null !== $label && $obj['label'] = $label;

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

    public function withDisplayOrder(int $displayOrder): self
    {
        $obj = clone $this;
        $obj['displayOrder'] = $displayOrder;

        return $obj;
    }

    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj['label'] = $label;

        return $obj;
    }
}
