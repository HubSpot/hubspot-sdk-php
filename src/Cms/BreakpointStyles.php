<?php

declare(strict_types=1);

namespace HubspotSDK\Cms;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type BreakpointStylesShape = array{
 *   hidden: bool, margin: mixed, padding: mixed
 * }
 */
final class BreakpointStyles implements BaseModel
{
    /** @use SdkModel<BreakpointStylesShape> */
    use SdkModel;

    #[Required]
    public bool $hidden;

    #[Required]
    public mixed $margin;

    #[Required]
    public mixed $padding;

    /**
     * `new BreakpointStyles()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BreakpointStyles::with(hidden: ..., margin: ..., padding: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BreakpointStyles)->withHidden(...)->withMargin(...)->withPadding(...)
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
        bool $hidden,
        mixed $margin,
        mixed $padding
    ): self {
        $self = new self;

        $self['hidden'] = $hidden;
        $self['margin'] = $margin;
        $self['padding'] = $padding;

        return $self;
    }

    public function withHidden(bool $hidden): self
    {
        $self = clone $this;
        $self['hidden'] = $hidden;

        return $self;
    }

    public function withMargin(mixed $margin): self
    {
        $self = clone $this;
        $self['margin'] = $margin;

        return $self;
    }

    public function withPadding(mixed $padding): self
    {
        $self = clone $this;
        $self['padding'] = $padding;

        return $self;
    }
}
