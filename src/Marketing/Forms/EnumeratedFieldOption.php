<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type EnumeratedFieldOptionShape = array{
 *   displayOrder: int, label: string, value: string, description?: string|null
 * }
 */
final class EnumeratedFieldOption implements BaseModel
{
    /** @use SdkModel<EnumeratedFieldOptionShape> */
    use SdkModel;

    /**
     * The order the choices will be displayed in.
     */
    #[Required]
    public int $displayOrder;

    /**
     * The visible label for this choice.
     */
    #[Required]
    public string $label;

    /**
     * The value which will be submitted if this choice is selected.
     */
    #[Required]
    public string $value;

    #[Optional]
    public ?string $description;

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
        string $value,
        ?string $description = null
    ): self {
        $obj = new self;

        $obj['displayOrder'] = $displayOrder;
        $obj['label'] = $label;
        $obj['value'] = $value;

        null !== $description && $obj['description'] = $description;

        return $obj;
    }

    /**
     * The order the choices will be displayed in.
     */
    public function withDisplayOrder(int $displayOrder): self
    {
        $obj = clone $this;
        $obj['displayOrder'] = $displayOrder;

        return $obj;
    }

    /**
     * The visible label for this choice.
     */
    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj['label'] = $label;

        return $obj;
    }

    /**
     * The value which will be submitted if this choice is selected.
     */
    public function withValue(string $value): self
    {
        $obj = clone $this;
        $obj['value'] = $value;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

        return $obj;
    }
}
