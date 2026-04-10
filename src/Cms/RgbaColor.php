<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type RgbaColorShape = array{a: float, b: int, g: int, r: int}
 */
final class RgbaColor implements BaseModel
{
    /** @use SdkModel<RgbaColorShape> */
    use SdkModel;

    /**
     * Alpha.
     */
    #[Required]
    public float $a;

    /**
     * Blue.
     */
    #[Required]
    public int $b;

    /**
     * Green.
     */
    #[Required]
    public int $g;

    /**
     * Red.
     */
    #[Required]
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
        $self = new self;

        $self['a'] = $a;
        $self['b'] = $b;
        $self['g'] = $g;
        $self['r'] = $r;

        return $self;
    }

    /**
     * Alpha.
     */
    public function withA(float $a): self
    {
        $self = clone $this;
        $self['a'] = $a;

        return $self;
    }

    /**
     * Blue.
     */
    public function withB(int $b): self
    {
        $self = clone $this;
        $self['b'] = $b;

        return $self;
    }

    /**
     * Green.
     */
    public function withG(int $g): self
    {
        $self = clone $this;
        $self['g'] = $g;

        return $self;
    }

    /**
     * Red.
     */
    public function withR(int $r): self
    {
        $self = clone $this;
        $self['r'] = $r;

        return $self;
    }
}
