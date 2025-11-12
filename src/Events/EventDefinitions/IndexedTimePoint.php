<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Events\EventDefinitions\IndexedTimePoint\TimeType;
use HubspotSDK\Events\EventDefinitions\IndexedTimePoint\TimezoneSource;

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

    #[Api]
    public NowReference|TodayReference|WeekReference|MonthReference|QuarterReference|FiscalQuarter|YearReference|FiscalYear $indexReference;

    /** @var value-of<TimeType> $timeType */
    #[Api(enum: TimeType::class)]
    public string $timeType;

    /** @var value-of<TimezoneSource> $timezoneSource */
    #[Api(enum: TimezoneSource::class)]
    public string $timezoneSource;

    #[Api]
    public string $zoneId;

    #[Api(optional: true)]
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
     * @param TimezoneSource|value-of<TimezoneSource> $timezoneSource
     * @param TimeType|value-of<TimeType> $timeType
     */
    public static function with(
        NowReference|TodayReference|WeekReference|MonthReference|QuarterReference|FiscalQuarter|YearReference|FiscalYear $indexReference,
        TimezoneSource|string $timezoneSource,
        string $zoneId,
        TimeType|string $timeType = 'INDEXED',
        ?IndexOffset $offset = null,
    ): self {
        $obj = new self;

        $obj->indexReference = $indexReference;
        $obj['timeType'] = $timeType;
        $obj['timezoneSource'] = $timezoneSource;
        $obj->zoneId = $zoneId;

        null !== $offset && $obj->offset = $offset;

        return $obj;
    }

    public function withIndexReference(
        NowReference|TodayReference|WeekReference|MonthReference|QuarterReference|FiscalQuarter|YearReference|FiscalYear $indexReference,
    ): self {
        $obj = clone $this;
        $obj->indexReference = $indexReference;

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
        $obj->zoneId = $zoneID;

        return $obj;
    }

    public function withOffset(IndexOffset $offset): self
    {
        $obj = clone $this;
        $obj->offset = $offset;

        return $obj;
    }
}
