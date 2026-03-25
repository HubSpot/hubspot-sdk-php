<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type DateTimeShape = array{
 *   dateOnly: bool, timeZoneShift: int, value: int
 * }
 */
final class DateTime implements BaseModel
{
    /** @use SdkModel<DateTimeShape> */
    use SdkModel;

    /**
     * Indicates whether the DateTime value represents only a date without a time component.
     */
    #[Required]
    public bool $dateOnly;

    /**
     * The integer value representing the shift in minutes from UTC for the DateTime value.
     */
    #[Required]
    public int $timeZoneShift;

    /**
     * The integer value representing a specific point in time.
     */
    #[Required]
    public int $value;

    /**
     * `new DateTime()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DateTime::with(dateOnly: ..., timeZoneShift: ..., value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DateTime)->withDateOnly(...)->withTimeZoneShift(...)->withValue(...)
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
        bool $dateOnly,
        int $timeZoneShift,
        int $value
    ): self {
        $self = new self;

        $self['dateOnly'] = $dateOnly;
        $self['timeZoneShift'] = $timeZoneShift;
        $self['value'] = $value;

        return $self;
    }

    /**
     * Indicates whether the DateTime value represents only a date without a time component.
     */
    public function withDateOnly(bool $dateOnly): self
    {
        $self = clone $this;
        $self['dateOnly'] = $dateOnly;

        return $self;
    }

    /**
     * The integer value representing the shift in minutes from UTC for the DateTime value.
     */
    public function withTimeZoneShift(int $timeZoneShift): self
    {
        $self = clone $this;
        $self['timeZoneShift'] = $timeZoneShift;

        return $self;
    }

    /**
     * The integer value representing a specific point in time.
     */
    public function withValue(int $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
