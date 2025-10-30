<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Properties\Groups;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Create and return a copy of a new property group.
 *
 * @see HubspotSDK\CRM\Properties\Groups->create
 *
 * @phpstan-type GroupCreateParamsShape = array{
 *   label: string, name: string, displayOrder?: int
 * }
 */
final class GroupCreateParams implements BaseModel
{
    /** @use SdkModel<GroupCreateParamsShape> */
    use SdkModel;
    use SdkParams;

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
     * GroupCreateParams::with(label: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new GroupCreateParams)->withLabel(...)->withName(...)
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
        string $label,
        string $name,
        ?int $displayOrder = null
    ): self {
        $obj = new self;

        $obj->label = $label;
        $obj->name = $name;

        null !== $displayOrder && $obj->displayOrder = $displayOrder;

        return $obj;
    }

    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj->label = $label;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withDisplayOrder(int $displayOrder): self
    {
        $obj = clone $this;
        $obj->displayOrder = $displayOrder;

        return $obj;
    }
}
