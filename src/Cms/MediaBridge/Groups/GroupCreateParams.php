<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\Groups;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Create a new property group for the specified object type.
 *
 * @see HubspotSDK\Services\Cms\MediaBridge\GroupsService::create()
 *
 * @phpstan-type GroupCreateParamsShape = array{
 *   appId: int, label: string, name: string, displayOrder?: int
 * }
 */
final class GroupCreateParams implements BaseModel
{
    /** @use SdkModel<GroupCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public int $appId;

    #[Api]
    public string $label;

    #[Api]
    public string $name;

    #[Api(optional: true)]
    public ?int $displayOrder;

    /**
     * `new GroupCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * GroupCreateParams::with(appId: ..., label: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new GroupCreateParams)->withAppID(...)->withLabel(...)->withName(...)
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
        string $label,
        string $name,
        ?int $displayOrder = null
    ): self {
        $obj = new self;

        $obj['appId'] = $appId;
        $obj['label'] = $label;
        $obj['name'] = $name;

        null !== $displayOrder && $obj['displayOrder'] = $displayOrder;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj['appId'] = $appID;

        return $obj;
    }

    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj['label'] = $label;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    public function withDisplayOrder(int $displayOrder): self
    {
        $obj = clone $this;
        $obj['displayOrder'] = $displayOrder;

        return $obj;
    }
}
