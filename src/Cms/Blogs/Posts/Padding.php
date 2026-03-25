<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Posts;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type SizeShape from \HubspotSDK\Cms\Blogs\Posts\Size
 *
 * @phpstan-type PaddingShape = array{
 *   bottom: Size|SizeShape,
 *   left: Size|SizeShape,
 *   right: Size|SizeShape,
 *   top: Size|SizeShape,
 * }
 */
final class Padding implements BaseModel
{
    /** @use SdkModel<PaddingShape> */
    use SdkModel;

    #[Required]
    public Size $bottom;

    #[Required]
    public Size $left;

    #[Required]
    public Size $right;

    #[Required]
    public Size $top;

    /**
     * `new Padding()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Padding::with(bottom: ..., left: ..., right: ..., top: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Padding)->withBottom(...)->withLeft(...)->withRight(...)->withTop(...)
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
     * @param Size|SizeShape $bottom
     * @param Size|SizeShape $left
     * @param Size|SizeShape $right
     * @param Size|SizeShape $top
     */
    public static function with(
        Size|array $bottom,
        Size|array $left,
        Size|array $right,
        Size|array $top
    ): self {
        $self = new self;

        $self['bottom'] = $bottom;
        $self['left'] = $left;
        $self['right'] = $right;
        $self['top'] = $top;

        return $self;
    }

    /**
     * @param Size|SizeShape $bottom
     */
    public function withBottom(Size|array $bottom): self
    {
        $self = clone $this;
        $self['bottom'] = $bottom;

        return $self;
    }

    /**
     * @param Size|SizeShape $left
     */
    public function withLeft(Size|array $left): self
    {
        $self = clone $this;
        $self['left'] = $left;

        return $self;
    }

    /**
     * @param Size|SizeShape $right
     */
    public function withRight(Size|array $right): self
    {
        $self = clone $this;
        $self['right'] = $right;

        return $self;
    }

    /**
     * @param Size|SizeShape $top
     */
    public function withTop(Size|array $top): self
    {
        $self = clone $this;
        $self['top'] = $top;

        return $self;
    }
}
