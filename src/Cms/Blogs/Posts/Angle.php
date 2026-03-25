<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Posts;

use HubspotSDK\Cms\Blogs\Posts\Angle\Units;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type AngleShape = array{units: Units|value-of<Units>, value: float}
 */
final class Angle implements BaseModel
{
    /** @use SdkModel<AngleShape> */
    use SdkModel;

    /**
     * The unit of measurement for the angle.
     *
     * @var value-of<Units> $units
     */
    #[Required(enum: Units::class)]
    public string $units;

    /**
     * The numerical representation of the angle.
     */
    #[Required]
    public float $value;

    /**
     * `new Angle()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Angle::with(units: ..., value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Angle)->withUnits(...)->withValue(...)
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
     * The unit of measurement for the angle.
     *
     * @param Units|value-of<Units> $units
     */
    public function withUnits(Units|string $units): self
    {
        $self = clone $this;
        $self['units'] = $units;

        return $self;
    }

    /**
     * The numerical representation of the angle.
     */
    public function withValue(float $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
