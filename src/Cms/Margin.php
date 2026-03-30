<?php

declare(strict_types=1);

namespace HubspotSDK\Cms;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type SizeShape from \HubspotSDK\Cms\Size
 *
 * @phpstan-type MarginShape = array{bottom: Size|SizeShape, top: Size|SizeShape}
 */
final class Margin implements BaseModel
{
    /** @use SdkModel<MarginShape> */
    use SdkModel;

    #[Required]
    public Size $bottom;

    #[Required]
    public Size $top;

    /**
     * `new Margin()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Margin::with(bottom: ..., top: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Margin)->withBottom(...)->withTop(...)
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
     * @param Size|SizeShape $top
     */
    public static function with(Size|array $bottom, Size|array $top): self
    {
        $self = new self;

        $self['bottom'] = $bottom;
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
     * @param Size|SizeShape $top
     */
    public function withTop(Size|array $top): self
    {
        $self = clone $this;
        $self['top'] = $top;

        return $self;
    }
}
