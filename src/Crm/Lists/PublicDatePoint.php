<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Lists\PublicDatePoint\TimeType;

/**
 * @phpstan-type PublicDatePointShape = array{
 *   day: int,
 *   month: int,
 *   timeType: TimeType|value-of<TimeType>,
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

    /**
     * The day component of the date.
     */
    #[Required]
    public int $day;

    /**
     * The month component of the date.
     */
    #[Required]
    public int $month;

    /**
     * Specifies the type of time (DATE).
     *
     * @var value-of<TimeType> $timeType
     */
    #[Required(enum: TimeType::class)]
    public string $timeType;

    /**
     * The year component of the date.
     */
    #[Required]
    public int $year;

    /**
     * The identifier for the time zone.
     */
    #[Required('zoneId')]
    public string $zoneID;

    /**
     * The hour component of the time.
     */
    #[Optional]
    public ?int $hour;

    /**
     * The millisecond component of the time.
     */
    #[Optional]
    public ?int $millisecond;

    /**
     * The minute component of the time.
     */
    #[Optional]
    public ?int $minute;

    /**
     * The second component of the time.
     */
    #[Optional]
    public ?int $second;

    /**
     * The source of the time zone information.
     */
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

    /**
     * The day component of the date.
     */
    public function withDay(int $day): self
    {
        $self = clone $this;
        $self['day'] = $day;

        return $self;
    }

    /**
     * The month component of the date.
     */
    public function withMonth(int $month): self
    {
        $self = clone $this;
        $self['month'] = $month;

        return $self;
    }

    /**
     * Specifies the type of time (DATE).
     *
     * @param TimeType|value-of<TimeType> $timeType
     */
    public function withTimeType(TimeType|string $timeType): self
    {
        $self = clone $this;
        $self['timeType'] = $timeType;

        return $self;
    }

    /**
     * The year component of the date.
     */
    public function withYear(int $year): self
    {
        $self = clone $this;
        $self['year'] = $year;

        return $self;
    }

    /**
     * The identifier for the time zone.
     */
    public function withZoneID(string $zoneID): self
    {
        $self = clone $this;
        $self['zoneID'] = $zoneID;

        return $self;
    }

    /**
     * The hour component of the time.
     */
    public function withHour(int $hour): self
    {
        $self = clone $this;
        $self['hour'] = $hour;

        return $self;
    }

    /**
     * The millisecond component of the time.
     */
    public function withMillisecond(int $millisecond): self
    {
        $self = clone $this;
        $self['millisecond'] = $millisecond;

        return $self;
    }

    /**
     * The minute component of the time.
     */
    public function withMinute(int $minute): self
    {
        $self = clone $this;
        $self['minute'] = $minute;

        return $self;
    }

    /**
     * The second component of the time.
     */
    public function withSecond(int $second): self
    {
        $self = clone $this;
        $self['second'] = $second;

        return $self;
    }

    /**
     * The source of the time zone information.
     */
    public function withTimezoneSource(string $timezoneSource): self
    {
        $self = clone $this;
        $self['timezoneSource'] = $timezoneSource;

        return $self;
    }
}
