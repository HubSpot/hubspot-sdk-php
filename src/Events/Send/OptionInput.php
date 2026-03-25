<?php

declare(strict_types=1);

namespace HubspotSDK\Events\Send;

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

    /**
     * null.
     */
    #[Required]
    public string $label;

    /**
     * null.
     */
    #[Required]
    public string $value;

    /**
     * null.
     */
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
        $self = new self;

        $self['displayOrder'] = $displayOrder;
        $self['hidden'] = $hidden;
        $self['label'] = $label;
        $self['value'] = $value;

        null !== $description && $self['description'] = $description;

        return $self;
    }

    public function withDisplayOrder(int $displayOrder): self
    {
        $self = clone $this;
        $self['displayOrder'] = $displayOrder;

        return $self;
    }

    public function withHidden(bool $hidden): self
    {
        $self = clone $this;
        $self['hidden'] = $hidden;

        return $self;
    }

    /**
     * null.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    /**
     * null.
     */
    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }

    /**
     * null.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }
}
