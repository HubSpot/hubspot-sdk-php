<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Events\EventDefinitions\DatePoint\TimeType;
use HubspotSDK\Events\EventDefinitions\DatePoint\TimezoneSource;

/**
 * @phpstan-type DatePointShape = array{
 *   day: int,
 *   month: int,
 *   timeType: value-of<TimeType>,
 *   timezoneSource: value-of<TimezoneSource>,
 *   year: int,
 *   zoneId: string,
 *   hour?: int|null,
 *   millisecond?: int|null,
 *   minute?: int|null,
 *   second?: int|null,
 * }
 */
final class DatePoint implements BaseModel
{
    /** @use SdkModel<DatePointShape> */
    use SdkModel;

    #[Required]
    public int $day;

    #[Required]
    public int $month;

    /** @var value-of<TimeType> $timeType */
    #[Required(enum: TimeType::class)]
    public string $timeType;

    /** @var value-of<TimezoneSource> $timezoneSource */
    #[Required(enum: TimezoneSource::class)]
    public string $timezoneSource;

    #[Required]
    public int $year;

    #[Required]
    public string $zoneId;

    #[Optional]
    public ?int $hour;

    #[Optional]
    public ?int $millisecond;

    #[Optional]
    public ?int $minute;

    #[Optional]
    public ?int $second;

    /**
     * `new DatePoint()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DatePoint::with(
     *   day: ...,
     *   month: ...,
     *   timeType: ...,
     *   timezoneSource: ...,
     *   year: ...,
     *   zoneId: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DatePoint)
     *   ->withDay(...)
     *   ->withMonth(...)
     *   ->withTimeType(...)
     *   ->withTimezoneSource(...)
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
     * @param TimezoneSource|value-of<TimezoneSource> $timezoneSource
     * @param TimeType|value-of<TimeType> $timeType
     */
    public static function with(
        int $day,
        int $month,
        TimezoneSource|string $timezoneSource,
        int $year,
        string $zoneId,
        TimeType|string $timeType = 'DATE',
        ?int $hour = null,
        ?int $millisecond = null,
        ?int $minute = null,
        ?int $second = null,
    ): self {
        $obj = new self;

        $obj['day'] = $day;
        $obj['month'] = $month;
        $obj['timeType'] = $timeType;
        $obj['timezoneSource'] = $timezoneSource;
        $obj['year'] = $year;
        $obj['zoneId'] = $zoneId;

        null !== $hour && $obj['hour'] = $hour;
        null !== $millisecond && $obj['millisecond'] = $millisecond;
        null !== $minute && $obj['minute'] = $minute;
        null !== $second && $obj['second'] = $second;

        return $obj;
    }

    public function withDay(int $day): self
    {
        $obj = clone $this;
        $obj['day'] = $day;

        return $obj;
    }

    public function withMonth(int $month): self
    {
        $obj = clone $this;
        $obj['month'] = $month;

        return $obj;
    }

    /**
     * @param TimeType|value-of<TimeType> $timeType
     */
    public function withTimeType(TimeType|string $timeType): self
    {
        $obj = clone $this;
        $obj['timeType'] = $timeType;

        return $obj;
    }

    /**
     * @param TimezoneSource|value-of<TimezoneSource> $timezoneSource
     */
    public function withTimezoneSource(
        TimezoneSource|string $timezoneSource
    ): self {
        $obj = clone $this;
        $obj['timezoneSource'] = $timezoneSource;

        return $obj;
    }

    public function withYear(int $year): self
    {
        $obj = clone $this;
        $obj['year'] = $year;

        return $obj;
    }

    public function withZoneID(string $zoneID): self
    {
        $obj = clone $this;
        $obj['zoneId'] = $zoneID;

        return $obj;
    }

    public function withHour(int $hour): self
    {
        $obj = clone $this;
        $obj['hour'] = $hour;

        return $obj;
    }

    public function withMillisecond(int $millisecond): self
    {
        $obj = clone $this;
        $obj['millisecond'] = $millisecond;

        return $obj;
    }

    public function withMinute(int $minute): self
    {
        $obj = clone $this;
        $obj['minute'] = $minute;

        return $obj;
    }

    public function withSecond(int $second): self
    {
        $obj = clone $this;
        $obj['second'] = $second;

        return $obj;
    }
}
