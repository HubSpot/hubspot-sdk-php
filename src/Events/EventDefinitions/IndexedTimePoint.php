<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Events\EventDefinitions\IndexedTimePoint\TimeType;
use HubspotSDK\Events\EventDefinitions\IndexedTimePoint\TimezoneSource;
use HubspotSDK\Events\EventDefinitions\NowReference\ReferenceType;
use HubspotSDK\Events\EventDefinitions\WeekReference\DayOfWeek;

/**
 * @phpstan-type IndexedTimePointShape = array{
 *   indexReference: NowReference|TodayReference|WeekReference|MonthReference|QuarterReference|FiscalQuarter|YearReference|FiscalYear,
 *   timeType: value-of<TimeType>,
 *   timezoneSource: value-of<TimezoneSource>,
 *   zoneId: string,
 *   offset?: IndexOffset|null,
 * }
 */
final class IndexedTimePoint implements BaseModel
{
    /** @use SdkModel<IndexedTimePointShape> */
    use SdkModel;

    #[Required]
    public NowReference|TodayReference|WeekReference|MonthReference|QuarterReference|FiscalQuarter|YearReference|FiscalYear $indexReference;

    /** @var value-of<TimeType> $timeType */
    #[Required(enum: TimeType::class)]
    public string $timeType;

    /** @var value-of<TimezoneSource> $timezoneSource */
    #[Required(enum: TimezoneSource::class)]
    public string $timezoneSource;

    #[Required]
    public string $zoneId;

    #[Optional]
    public ?IndexOffset $offset;

    /**
     * `new IndexedTimePoint()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IndexedTimePoint::with(
     *   indexReference: ..., timeType: ..., timezoneSource: ..., zoneId: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IndexedTimePoint)
     *   ->withIndexReference(...)
     *   ->withTimeType(...)
     *   ->withTimezoneSource(...)
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
     * @param NowReference|array{
     *   referenceType: value-of<ReferenceType>,
     *   hour?: int|null,
     *   millisecond?: int|null,
     *   minute?: int|null,
     *   second?: int|null,
     * }|TodayReference|array{
     *   referenceType: value-of<TodayReference\ReferenceType>,
     *   hour?: int|null,
     *   millisecond?: int|null,
     *   minute?: int|null,
     *   second?: int|null,
     * }|WeekReference|array{
     *   dayOfWeek: value-of<DayOfWeek>,
     *   referenceType: value-of<WeekReference\ReferenceType>,
     *   hour?: int|null,
     *   millisecond?: int|null,
     *   minute?: int|null,
     *   second?: int|null,
     * }|MonthReference|array{
     *   day: int,
     *   referenceType: value-of<MonthReference\ReferenceType>,
     *   hour?: int|null,
     *   millisecond?: int|null,
     *   minute?: int|null,
     *   second?: int|null,
     * }|QuarterReference|array{
     *   day: int,
     *   month: int,
     *   referenceType: value-of<QuarterReference\ReferenceType>,
     *   hour?: int|null,
     *   millisecond?: int|null,
     *   minute?: int|null,
     *   second?: int|null,
     * }|FiscalQuarter|array{
     *   day: int,
     *   month: int,
     *   referenceType: value-of<FiscalQuarter\ReferenceType>,
     *   hour?: int|null,
     *   millisecond?: int|null,
     *   minute?: int|null,
     *   second?: int|null,
     * }|YearReference|array{
     *   day: int,
     *   month: int,
     *   referenceType: value-of<YearReference\ReferenceType>,
     *   hour?: int|null,
     *   millisecond?: int|null,
     *   minute?: int|null,
     *   second?: int|null,
     * }|FiscalYear|array{
     *   day: int,
     *   month: int,
     *   referenceType: value-of<FiscalYear\ReferenceType>,
     *   hour?: int|null,
     *   millisecond?: int|null,
     *   minute?: int|null,
     *   second?: int|null,
     * } $indexReference
     * @param TimezoneSource|value-of<TimezoneSource> $timezoneSource
     * @param TimeType|value-of<TimeType> $timeType
     * @param IndexOffset|array{
     *   days?: int|null,
     *   hours?: int|null,
     *   milliseconds?: int|null,
     *   minutes?: int|null,
     *   months?: int|null,
     *   quarters?: int|null,
     *   seconds?: int|null,
     *   weeks?: int|null,
     *   years?: int|null,
     * } $offset
     */
    public static function with(
        NowReference|array|TodayReference|WeekReference|MonthReference|QuarterReference|FiscalQuarter|YearReference|FiscalYear $indexReference,
        TimezoneSource|string $timezoneSource,
        string $zoneId,
        TimeType|string $timeType = 'INDEXED',
        IndexOffset|array|null $offset = null,
    ): self {
        $obj = new self;

        $obj['indexReference'] = $indexReference;
        $obj['timeType'] = $timeType;
        $obj['timezoneSource'] = $timezoneSource;
        $obj['zoneId'] = $zoneId;

        null !== $offset && $obj['offset'] = $offset;

        return $obj;
    }

    /**
     * @param NowReference|array{
     *   referenceType: value-of<ReferenceType>,
     *   hour?: int|null,
     *   millisecond?: int|null,
     *   minute?: int|null,
     *   second?: int|null,
     * }|TodayReference|array{
     *   referenceType: value-of<TodayReference\ReferenceType>,
     *   hour?: int|null,
     *   millisecond?: int|null,
     *   minute?: int|null,
     *   second?: int|null,
     * }|WeekReference|array{
     *   dayOfWeek: value-of<DayOfWeek>,
     *   referenceType: value-of<WeekReference\ReferenceType>,
     *   hour?: int|null,
     *   millisecond?: int|null,
     *   minute?: int|null,
     *   second?: int|null,
     * }|MonthReference|array{
     *   day: int,
     *   referenceType: value-of<MonthReference\ReferenceType>,
     *   hour?: int|null,
     *   millisecond?: int|null,
     *   minute?: int|null,
     *   second?: int|null,
     * }|QuarterReference|array{
     *   day: int,
     *   month: int,
     *   referenceType: value-of<QuarterReference\ReferenceType>,
     *   hour?: int|null,
     *   millisecond?: int|null,
     *   minute?: int|null,
     *   second?: int|null,
     * }|FiscalQuarter|array{
     *   day: int,
     *   month: int,
     *   referenceType: value-of<FiscalQuarter\ReferenceType>,
     *   hour?: int|null,
     *   millisecond?: int|null,
     *   minute?: int|null,
     *   second?: int|null,
     * }|YearReference|array{
     *   day: int,
     *   month: int,
     *   referenceType: value-of<YearReference\ReferenceType>,
     *   hour?: int|null,
     *   millisecond?: int|null,
     *   minute?: int|null,
     *   second?: int|null,
     * }|FiscalYear|array{
     *   day: int,
     *   month: int,
     *   referenceType: value-of<FiscalYear\ReferenceType>,
     *   hour?: int|null,
     *   millisecond?: int|null,
     *   minute?: int|null,
     *   second?: int|null,
     * } $indexReference
     */
    public function withIndexReference(
        NowReference|array|TodayReference|WeekReference|MonthReference|QuarterReference|FiscalQuarter|YearReference|FiscalYear $indexReference,
    ): self {
        $obj = clone $this;
        $obj['indexReference'] = $indexReference;

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

    public function withZoneID(string $zoneID): self
    {
        $obj = clone $this;
        $obj['zoneId'] = $zoneID;

        return $obj;
    }

    /**
     * @param IndexOffset|array{
     *   days?: int|null,
     *   hours?: int|null,
     *   milliseconds?: int|null,
     *   minutes?: int|null,
     *   months?: int|null,
     *   quarters?: int|null,
     *   seconds?: int|null,
     *   weeks?: int|null,
     *   years?: int|null,
     * } $offset
     */
    public function withOffset(IndexOffset|array $offset): self
    {
        $obj = clone $this;
        $obj['offset'] = $offset;

        return $obj;
    }
}
