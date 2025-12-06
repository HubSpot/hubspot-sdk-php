<?php

declare(strict_types=1);

namespace HubspotSDK\Cms;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * A color defined by RGB values.
 *
 * @phpstan-type RgbaColorShape = array{a: float, b: int, g: int, r: int}
 */
final class RgbaColor implements BaseModel
{
    /** @use SdkModel<RgbaColorShape> */
    use SdkModel;

    /**
     * Alpha.
     */
    #[Api]
    public float $a;

    /**
     * Blue.
     */
    #[Api]
    public int $b;

    /**
     * Green.
     */
    #[Api]
    public int $g;

    /**
     * Red.
     */
    #[Api]
    public int $r;

    /**
     * `new RgbaColor()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RgbaColor::with(a: ..., b: ..., g: ..., r: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RgbaColor)->withA(...)->withB(...)->withG(...)->withR(...)
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
    public static function with(float $a, int $b, int $g, int $r): self
    {
        $obj = new self;

        $obj['a'] = $a;
        $obj['b'] = $b;
        $obj['g'] = $g;
        $obj['r'] = $r;

        return $obj;
    }

    /**
     * Alpha.
     */
    public function withA(float $a): self
    {
        $obj = clone $this;
        $obj['a'] = $a;

        return $obj;
    }

    /**
     * Blue.
     */
    public function withB(int $b): self
    {
        $obj = clone $this;
        $obj['b'] = $b;

        return $obj;
    }

    /**
     * Green.
     */
    public function withG(int $g): self
    {
        $obj = clone $this;
        $obj['g'] = $g;

        return $obj;
    }

    /**
     * Red.
     */
    public function withR(int $r): self
    {
        $obj = clone $this;
        $obj['r'] = $r;

        return $obj;
    }
}
