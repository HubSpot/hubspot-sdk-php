<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicOptionShape = array{
 *   label: string,
 *   value: string,
 *   description?: string|null,
 *   displayOrder?: int|null,
 * }
 */
final class PublicOption implements BaseModel
{
    /** @use SdkModel<PublicOptionShape> */
    use SdkModel;

    /**
     * A user-friendly label that identifies the option.
     */
    #[Required]
    public string $label;

    /**
     * The actual value of the option.
     */
    #[Required]
    public string $value;

    /**
     * A description of the option.
     */
    #[Optional]
    public ?string $description;

    /**
     * The position of the option relative to others in the list.
     */
    #[Optional]
    public ?int $displayOrder;

    /**
     * `new PublicOption()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicOption::with(label: ..., value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicOption)->withLabel(...)->withValue(...)
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
        string $value,
        ?string $description = null,
        ?int $displayOrder = null,
    ): self {
        $self = new self;

        $self['label'] = $label;
        $self['value'] = $value;

        null !== $description && $self['description'] = $description;
        null !== $displayOrder && $self['displayOrder'] = $displayOrder;

        return $self;
    }

    /**
     * A user-friendly label that identifies the option.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    /**
     * The actual value of the option.
     */
    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }

    /**
     * A description of the option.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * The position of the option relative to others in the list.
     */
    public function withDisplayOrder(int $displayOrder): self
    {
        $self = clone $this;
        $self['displayOrder'] = $displayOrder;

        return $self;
    }
}
