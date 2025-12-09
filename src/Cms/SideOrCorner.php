<?php

declare(strict_types=1);

namespace HubspotSDK\Cms;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type SideOrCornerShape = array{
 *   horizontalSide: string, verticalSide: string
 * }
 */
final class SideOrCorner implements BaseModel
{
    /** @use SdkModel<SideOrCornerShape> */
    use SdkModel;

    #[Required]
    public string $horizontalSide;

    #[Required]
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
     */
    public static function with(
        string $horizontalSide,
        string $verticalSide
    ): self {
        $self = new self;

        $self['horizontalSide'] = $horizontalSide;
        $self['verticalSide'] = $verticalSide;

        return $self;
    }

    public function withHorizontalSide(string $horizontalSide): self
    {
        $self = clone $this;
        $self['horizontalSide'] = $horizontalSide;

        return $self;
    }

    public function withVerticalSide(string $verticalSide): self
    {
        $self = clone $this;
        $self['verticalSide'] = $verticalSide;

        return $self;
    }
}
