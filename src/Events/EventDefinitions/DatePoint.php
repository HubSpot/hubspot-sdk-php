<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Events\EventDefinitions\DatePoint\TimeType;
use HubspotSDK\Events\EventDefinitions\DatePoint\TimezoneSource;

/**
 * @phpstan-type date_point = array{
 *   day: int,
 *   month: int,
 *   timeType: value-of<TimeType>,
 *   timezoneSource: value-of<TimezoneSource>,
 *   year: int,
 *   zoneID: string,
 *   hour?: int,
 *   millisecond?: int,
 *   minute?: int,
 *   second?: int,
 * }
 */
final class DatePoint implements BaseModel
{
    /** @use SdkModel<date_point> */
    use SdkModel;

    #[Api]
    public int $day;

    #[Api]
    public int $month;

    /** @var value-of<TimeType> $timeType */
    #[Api(enum: TimeType::class)]
    public string $timeType;

    /** @var value-of<TimezoneSource> $timezoneSource */
    #[Api(enum: TimezoneSource::class)]
    public string $timezoneSource;

    #[Api]
    public int $year;

    #[Api('zoneId')]
    public string $zoneID;

    #[Api(optional: true)]
    public ?int $hour;

    #[Api(optional: true)]
    public ?int $millisecond;

    #[Api(optional: true)]
    public ?int $minute;

    #[Api(optional: true)]
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
     *   zoneID: ...,
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
        string $zoneID,
        TimeType|string $timeType = 'DATE',
        ?int $hour = null,
        ?int $millisecond = null,
        ?int $minute = null,
        ?int $second = null,
    ): self {
        $obj = new self;

        $obj->day = $day;
        $obj->month = $month;
        $obj['timeType'] = $timeType;
        $obj['timezoneSource'] = $timezoneSource;
        $obj->year = $year;
        $obj->zoneID = $zoneID;

        null !== $hour && $obj->hour = $hour;
        null !== $millisecond && $obj->millisecond = $millisecond;
        null !== $minute && $obj->minute = $minute;
        null !== $second && $obj->second = $second;

        return $obj;
    }

    public function withDay(int $day): self
    {
        $obj = clone $this;
        $obj->day = $day;

        return $obj;
    }

    public function withMonth(int $month): self
    {
        $obj = clone $this;
        $obj->month = $month;

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
        $obj->year = $year;

        return $obj;
    }

    public function withZoneID(string $zoneID): self
    {
        $obj = clone $this;
        $obj->zoneID = $zoneID;

        return $obj;
    }

    public function withHour(int $hour): self
    {
        $obj = clone $this;
        $obj->hour = $hour;

        return $obj;
    }

    public function withMillisecond(int $millisecond): self
    {
        $obj = clone $this;
        $obj->millisecond = $millisecond;

        return $obj;
    }

    public function withMinute(int $minute): self
    {
        $obj = clone $this;
        $obj->minute = $minute;

        return $obj;
    }

    public function withSecond(int $second): self
    {
        $obj = clone $this;
        $obj->second = $second;

        return $obj;
    }
}
