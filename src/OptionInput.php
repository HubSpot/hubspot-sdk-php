<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type OptionInputShape = array{
 *   displayOrder: int,
 *   hidden: bool,
 *   label: string,
 *   value: string,
 *   description?: string|null,
 * }
 */
final class OptionInput implements BaseModel
{
    /** @use SdkModel<OptionInputShape> */
    use SdkModel;

    #[Required]
    public int $displayOrder;

    #[Required]
    public bool $hidden;

    #[Required]
    public string $label;

    #[Required]
    public string $value;

    #[Optional]
    public ?string $description;

    /**
     * `new OptionInput()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * OptionInput::with(displayOrder: ..., hidden: ..., label: ..., value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new OptionInput)
     *   ->withDisplayOrder(...)
     *   ->withHidden(...)
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
        bool $hidden,
        string $label,
        string $value,
        ?string $description = null,
    ): self {
        $obj = new self;

        $obj['displayOrder'] = $displayOrder;
        $obj['hidden'] = $hidden;
        $obj['label'] = $label;
        $obj['value'] = $value;

        null !== $description && $obj['description'] = $description;

        return $obj;
    }

    public function withDisplayOrder(int $displayOrder): self
    {
        $obj = clone $this;
        $obj['displayOrder'] = $displayOrder;

        return $obj;
    }

    public function withHidden(bool $hidden): self
    {
        $obj = clone $this;
        $obj['hidden'] = $hidden;

        return $obj;
    }

    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj['label'] = $label;

        return $obj;
    }

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
