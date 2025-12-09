<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicDatePoint\TimeType;

/**
 * @phpstan-type PublicDatePointShape = array{
 *   day: int,
 *   month: int,
 *   timeType: value-of<TimeType>,
 *   year: int,
 *   zoneID: string,
 *   hour?: int|null,
 *   millisecond?: int|null,
 *   minute?: int|null,
 *   second?: int|null,
 *   timezoneSource?: string|null,
 * }
 */
final class PublicDatePoint implements BaseModel
{
    /** @use SdkModel<PublicDatePointShape> */
    use SdkModel;

    #[Required]
    public int $day;

    #[Required]
    public int $month;

    /** @var value-of<TimeType> $timeType */
    #[Required(enum: TimeType::class)]
    public string $timeType;

    #[Required]
    public int $year;

    #[Required('zoneId')]
    public string $zoneID;

    #[Optional]
    public ?int $hour;

    #[Optional]
    public ?int $millisecond;

    #[Optional]
    public ?int $minute;

    #[Optional]
    public ?int $second;

    #[Optional]
    public ?string $timezoneSource;

    /**
     * `new PublicDatePoint()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicDatePoint::with(
     *   day: ..., month: ..., timeType: ..., year: ..., zoneID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicDatePoint)
     *   ->withDay(...)
     *   ->withMonth(...)
     *   ->withTimeType(...)
     *   ->withYear(...)
     *   ->withZoneID(...)
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
     * @param TimeType|value-of<TimeType> $timeType
     */
    public static function with(
        int $day,
        int $month,
        int $year,
        string $zoneID,
        TimeType|string $timeType = 'DATE',
        ?int $hour = null,
        ?int $millisecond = null,
        ?int $minute = null,
        ?int $second = null,
        ?string $timezoneSource = null,
    ): self {
        $self = new self;

        $self['day'] = $day;
        $self['month'] = $month;
        $self['timeType'] = $timeType;
        $self['year'] = $year;
        $self['zoneID'] = $zoneID;

        null !== $hour && $self['hour'] = $hour;
        null !== $millisecond && $self['millisecond'] = $millisecond;
        null !== $minute && $self['minute'] = $minute;
        null !== $second && $self['second'] = $second;
        null !== $timezoneSource && $self['timezoneSource'] = $timezoneSource;

        return $self;
    }

    public function withDay(int $day): self
    {
        $self = clone $this;
        $self['day'] = $day;

        return $self;
    }

    public function withMonth(int $month): self
    {
        $self = clone $this;
        $self['month'] = $month;

        return $self;
    }

    /**
     * @param TimeType|value-of<TimeType> $timeType
     */
    public function withTimeType(TimeType|string $timeType): self
    {
        $self = clone $this;
        $self['timeType'] = $timeType;

        return $self;
    }

    public function withYear(int $year): self
    {
        $self = clone $this;
        $self['year'] = $year;

        return $self;
    }

    public function withZoneID(string $zoneID): self
    {
        $self = clone $this;
        $self['zoneID'] = $zoneID;

        return $self;
    }

    public function withHour(int $hour): self
    {
        $self = clone $this;
        $self['hour'] = $hour;

        return $self;
    }

    public function withMillisecond(int $millisecond): self
    {
        $self = clone $this;
        $self['millisecond'] = $millisecond;

        return $self;
    }

    public function withMinute(int $minute): self
    {
        $self = clone $this;
        $self['minute'] = $minute;

        return $self;
    }

    public function withSecond(int $second): self
    {
        $self = clone $this;
        $self['second'] = $second;

        return $self;
    }

    public function withTimezoneSource(string $timezoneSource): self
    {
        $self = clone $this;
        $self['timezoneSource'] = $timezoneSource;

        return $self;
    }
}
