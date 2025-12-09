<?php

declare(strict_types=1);

namespace HubspotSDK\Cms;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type AngleShape = array{units: string, value: float}
 */
final class Angle implements BaseModel
{
    /** @use SdkModel<AngleShape> */
    use SdkModel;

    #[Required]
    public string $units;

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
     */
    public static function with(string $units, float $value): self
    {
        $self = new self;

        $self['units'] = $units;
        $self['value'] = $value;

        return $self;
    }

    public function withUnits(string $units): self
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
