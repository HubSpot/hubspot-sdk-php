<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type enumerated_field_option = array{
 *   displayOrder: int, label: string, value: string
 * }
 */
final class EnumeratedFieldOption implements BaseModel
{
    /** @use SdkModel<enumerated_field_option> */
    use SdkModel;

    #[Api]
    public int $displayOrder;

    #[Api]
    public string $label;

    #[Api]
    public string $value;

    /**
     * `new EnumeratedFieldOption()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EnumeratedFieldOption::with(displayOrder: ..., label: ..., value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EnumeratedFieldOption)
     *   ->withDisplayOrder(...)
     *   ->withLabel(...)
     *   ->withValue(...)
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
        int $displayOrder,
        string $label,
        string $value
    ): self {
        $obj = new self;

        $obj->displayOrder = $displayOrder;
        $obj->label = $label;
        $obj->value = $value;

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

    public function withValue(string $value): self
    {
        $obj = clone $this;
        $obj->value = $value;

        return $obj;
    }
}
