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
        $self = new self;

        $self['displayOrder'] = $displayOrder;
        $self['label'] = $label;
        $self['value'] = $value;

        null !== $description && $self['description'] = $description;

        return $self;
    }

    /**
     * The order the choices will be displayed in.
     */
    public function withDisplayOrder(int $displayOrder): self
    {
        $self = clone $this;
        $self['displayOrder'] = $displayOrder;

        return $self;
    }

    /**
     * The visible label for this choice.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    /**
     * The value which will be submitted if this choice is selected.
     */
    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }
}
