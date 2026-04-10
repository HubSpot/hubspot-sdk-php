<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type MarginShape from \HubSpotSDK\Cms\Margin
 * @phpstan-import-type PaddingShape from \HubSpotSDK\Cms\Padding
 *
 * @phpstan-type BreakpointStylesShape = array{
 *   hidden: bool, margin: Margin|MarginShape, padding: Padding|PaddingShape
 * }
 */
final class BreakpointStyles implements BaseModel
{
    /** @use SdkModel<BreakpointStylesShape> */
    use SdkModel;

    /**
     * Boolean indicating if the breakpoint is visible.
     */
    #[Required]
    public bool $hidden;

    #[Required]
    public Margin $margin;

    #[Required]
    public Padding $padding;

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
     *
     * @param Margin|MarginShape $margin
     * @param Padding|PaddingShape $padding
     */
    public static function with(
        bool $hidden,
        Margin|array $margin,
        Padding|array $padding
    ): self {
        $self = new self;

        $self['hidden'] = $hidden;
        $self['margin'] = $margin;
        $self['padding'] = $padding;

        return $self;
    }

    /**
     * Boolean indicating if the breakpoint is visible.
     */
    public function withHidden(bool $hidden): self
    {
        $self = clone $this;
        $self['hidden'] = $hidden;

        return $self;
    }

    /**
     * @param Margin|MarginShape $margin
     */
    public function withMargin(Margin|array $margin): self
    {
        $self = clone $this;
        $self['margin'] = $margin;

        return $self;
    }

    /**
     * @param Padding|PaddingShape $padding
     */
    public function withPadding(Padding|array $padding): self
    {
        $self = clone $this;
        $self['padding'] = $padding;

        return $self;
    }
}
