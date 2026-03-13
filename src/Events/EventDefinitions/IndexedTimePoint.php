<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Events\EventDefinitions\IndexedTimePoint\TimeType;
use HubspotSDK\Events\EventDefinitions\IndexedTimePoint\TimezoneSource;

/**
 * @phpstan-import-type IndexReferenceVariants from \HubspotSDK\Events\EventDefinitions\IndexedTimePoint\IndexReference
 * @phpstan-import-type IndexReferenceShape from \HubspotSDK\Events\EventDefinitions\IndexedTimePoint\IndexReference
 * @phpstan-import-type IndexOffsetShape from \HubspotSDK\Events\EventDefinitions\IndexOffset
 *
 * @phpstan-type IndexedTimePointShape = array{
 *   indexReference: IndexReferenceShape,
 *   timeType: TimeType|value-of<TimeType>,
 *   timezoneSource: TimezoneSource|value-of<TimezoneSource>,
 *   zoneID: string,
 *   offset?: null|IndexOffset|IndexOffsetShape,
 * }
 */
final class IndexedTimePoint implements BaseModel
{
    /** @use SdkModel<IndexedTimePointShape> */
    use SdkModel;

    /** @var IndexReferenceVariants $indexReference */
    #[Required]
    public NowReference|TodayReference|WeekReference|MonthReference|QuarterReference|FiscalQuarter|YearReference|FiscalYear $indexReference;

    /** @var value-of<TimeType> $timeType */
    #[Required(enum: TimeType::class)]
    public string $timeType;

    /** @var value-of<TimezoneSource> $timezoneSource */
    #[Required(enum: TimezoneSource::class)]
    public string $timezoneSource;

    #[Required('zoneId')]
    public string $zoneID;

    #[Optional]
    public ?IndexOffset $offset;

    /**
     * `new IndexedTimePoint()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IndexedTimePoint::with(
     *   indexReference: ..., timeType: ..., timezoneSource: ..., zoneID: ...
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
     * @param IndexReferenceShape $indexReference
     * @param TimezoneSource|value-of<TimezoneSource> $timezoneSource
     * @param TimeType|value-of<TimeType> $timeType
     * @param IndexOffset|IndexOffsetShape|null $offset
     */
    public static function with(
        NowReference|array|TodayReference|WeekReference|MonthReference|QuarterReference|FiscalQuarter|YearReference|FiscalYear $indexReference,
        TimezoneSource|string $timezoneSource,
        string $zoneID,
        TimeType|string $timeType = 'INDEXED',
        IndexOffset|array|null $offset = null,
    ): self {
        $self = new self;

        $self['indexReference'] = $indexReference;
        $self['timeType'] = $timeType;
        $self['timezoneSource'] = $timezoneSource;
        $self['zoneID'] = $zoneID;

        null !== $offset && $self['offset'] = $offset;

        return $self;
    }

    /**
     * @param IndexReferenceShape $indexReference
     */
    public function withIndexReference(
        NowReference|array|TodayReference|WeekReference|MonthReference|QuarterReference|FiscalQuarter|YearReference|FiscalYear $indexReference,
    ): self {
        $self = clone $this;
        $self['indexReference'] = $indexReference;

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

    /**
     * @param TimezoneSource|value-of<TimezoneSource> $timezoneSource
     */
    public function withTimezoneSource(
        TimezoneSource|string $timezoneSource
    ): self {
        $self = clone $this;
        $self['timezoneSource'] = $timezoneSource;

        return $self;
    }

    public function withZoneID(string $zoneID): self
    {
        $self = clone $this;
        $self['zoneID'] = $zoneID;

        return $self;
    }

    /**
     * @param IndexOffset|IndexOffsetShape $offset
     */
    public function withOffset(IndexOffset|array $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }
}
