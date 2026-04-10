<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms;

use HubSpotSDK\Cms\SideOrCorner\HorizontalSide;
use HubSpotSDK\Cms\SideOrCorner\VerticalSide;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type SideOrCornerShape = array{
 *   horizontalSide: HorizontalSide|value-of<HorizontalSide>,
 *   verticalSide: VerticalSide|value-of<VerticalSide>,
 * }
 */
final class SideOrCorner implements BaseModel
{
    /** @use SdkModel<SideOrCornerShape> */
    use SdkModel;

    /**
     * Specifies the horizontal side of an element.
     *
     * @var value-of<HorizontalSide> $horizontalSide
     */
    #[Required(enum: HorizontalSide::class)]
    public string $horizontalSide;

    /**
     * Specifies the vertical side of an element.
     *
     * @var value-of<VerticalSide> $verticalSide
     */
    #[Required(enum: VerticalSide::class)]
    public string $verticalSide;

    /**
     * `new SideOrCorner()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SideOrCorner::with(horizontalSide: ..., verticalSide: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SideOrCorner)->withHorizontalSide(...)->withVerticalSide(...)
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
     * @param HorizontalSide|value-of<HorizontalSide> $horizontalSide
     * @param VerticalSide|value-of<VerticalSide> $verticalSide
     */
    public static function with(
        HorizontalSide|string $horizontalSide,
        VerticalSide|string $verticalSide
    ): self {
        $self = new self;

        $self['horizontalSide'] = $horizontalSide;
        $self['verticalSide'] = $verticalSide;

        return $self;
    }

    /**
     * Specifies the horizontal side of an element.
     *
     * @param HorizontalSide|value-of<HorizontalSide> $horizontalSide
     */
    public function withHorizontalSide(
        HorizontalSide|string $horizontalSide
    ): self {
        $self = clone $this;
        $self['horizontalSide'] = $horizontalSide;

        return $self;
    }

    /**
     * Specifies the vertical side of an element.
     *
     * @param VerticalSide|value-of<VerticalSide> $verticalSide
     */
    public function withVerticalSide(VerticalSide|string $verticalSide): self
    {
        $self = clone $this;
        $self['verticalSide'] = $verticalSide;

        return $self;
    }
}
