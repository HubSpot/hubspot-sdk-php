<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Posts;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type side_or_corner = array{
 *   horizontalSide: string, verticalSide: string
 * }
 */
final class SideOrCorner implements BaseModel
{
    /** @use SdkModel<side_or_corner> */
    use SdkModel;

    #[Api]
    public string $horizontalSide;

    #[Api]
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
        $obj = new self;

        $obj->horizontalSide = $horizontalSide;
        $obj->verticalSide = $verticalSide;

        return $obj;
    }

    public function withHorizontalSide(string $horizontalSide): self
    {
        $obj = clone $this;
        $obj->horizontalSide = $horizontalSide;

        return $obj;
    }

    public function withVerticalSide(string $verticalSide): self
    {
        $obj = clone $this;
        $obj->verticalSide = $verticalSide;

        return $obj;
    }
}
