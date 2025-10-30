<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Posts;

use HubspotSDK\Core\Attributes\Api;
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

    #[Api]
    public bool $hidden;

    #[Api]
    public mixed $margin;

    #[Api]
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
        $obj = new self;

        $obj->hidden = $hidden;
        $obj->margin = $margin;
        $obj->padding = $padding;

        return $obj;
    }

    public function withHidden(bool $hidden): self
    {
        $obj = clone $this;
        $obj->hidden = $hidden;

        return $obj;
    }

    public function withMargin(mixed $margin): self
    {
        $obj = clone $this;
        $obj->margin = $margin;

        return $obj;
    }

    public function withPadding(mixed $padding): self
    {
        $obj = clone $this;
        $obj->padding = $padding;

        return $obj;
    }
}
