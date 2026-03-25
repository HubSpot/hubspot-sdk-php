<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Posts;

use HubspotSDK\Cms\Blogs\Posts\Size\Units;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type SizeShape = array{units: Units|value-of<Units>, value: float}
 */
final class Size implements BaseModel
{
    /** @use SdkModel<SizeShape> */
    use SdkModel;

    /** @var value-of<Units> $units */
    #[Required(enum: Units::class)]
    public string $units;

    #[Required]
    public float $value;

    /**
     * `new Size()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Size::with(units: ..., value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Size)->withUnits(...)->withValue(...)
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
     * @param Units|value-of<Units> $units
     */
    public static function with(Units|string $units, float $value): self
    {
        $self = new self;

        $self['units'] = $units;
        $self['value'] = $value;

        return $self;
    }

    /**
     * @param Units|value-of<Units> $units
     */
    public function withUnits(Units|string $units): self
    {
        $self = clone $this;
        $self['units'] = $units;

        return $self;
    }

    public function withValue(float $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
