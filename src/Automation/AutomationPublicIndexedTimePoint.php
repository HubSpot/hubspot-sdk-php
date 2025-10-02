<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\AutomationPublicIndexedTimePoint\TimeType;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_public_indexed_time_point = array{
 *   indexReference: AutomationPublicNowReference|AutomationPublicTodayReference|AutomationPublicWeekReference|AutomationPublicFiscalQuarterReference|AutomationPublicFiscalYearReference|AutomationPublicYearReference|AutomationPublicQuarterReference|AutomationPublicMonthReference,
 *   timeType: value-of<TimeType>,
 *   zoneID: string,
 *   offset?: AutomationPublicIndexOffset,
 *   timezoneSource?: string,
 * }
 */
final class AutomationPublicIndexedTimePoint implements BaseModel
{
    /** @use SdkModel<automation_public_indexed_time_point> */
    use SdkModel;

    #[Api]
    public AutomationPublicNowReference|AutomationPublicTodayReference|AutomationPublicWeekReference|AutomationPublicFiscalQuarterReference|AutomationPublicFiscalYearReference|AutomationPublicYearReference|AutomationPublicQuarterReference|AutomationPublicMonthReference $indexReference;

    /** @var value-of<TimeType> $timeType */
    #[Api(enum: TimeType::class)]
    public string $timeType;

    #[Api('zoneId')]
    public string $zoneID;

    #[Api(optional: true)]
    public ?AutomationPublicIndexOffset $offset;

    #[Api(optional: true)]
    public ?string $timezoneSource;

    /**
     * `new AutomationPublicIndexedTimePoint()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationPublicIndexedTimePoint::with(
     *   indexReference: ..., timeType: ..., zoneID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationPublicIndexedTimePoint)
     *   ->withIndexReference(...)
     *   ->withTimeType(...)
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
        AutomationPublicNowReference|AutomationPublicTodayReference|AutomationPublicWeekReference|AutomationPublicFiscalQuarterReference|AutomationPublicFiscalYearReference|AutomationPublicYearReference|AutomationPublicQuarterReference|AutomationPublicMonthReference $indexReference,
        string $zoneID,
        TimeType|string $timeType = 'INDEXED',
        ?AutomationPublicIndexOffset $offset = null,
        ?string $timezoneSource = null,
    ): self {
        $obj = new self;

        $obj->indexReference = $indexReference;
        $obj->timeType = $timeType instanceof TimeType ? $timeType->value : $timeType;
        $obj->zoneID = $zoneID;

        null !== $offset && $obj->offset = $offset;
        null !== $timezoneSource && $obj->timezoneSource = $timezoneSource;

        return $obj;
    }

    public function withIndexReference(
        AutomationPublicNowReference|AutomationPublicTodayReference|AutomationPublicWeekReference|AutomationPublicFiscalQuarterReference|AutomationPublicFiscalYearReference|AutomationPublicYearReference|AutomationPublicQuarterReference|AutomationPublicMonthReference $indexReference,
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
        $obj->timeType = $timeType instanceof TimeType ? $timeType->value : $timeType;

        return $obj;
    }

    public function withZoneID(string $zoneID): self
    {
        $obj = clone $this;
        $obj->zoneID = $zoneID;

        return $obj;
    }

    public function withOffset(AutomationPublicIndexOffset $offset): self
    {
        $obj = clone $this;
        $obj->offset = $offset;

        return $obj;
    }

    public function withTimezoneSource(string $timezoneSource): self
    {
        $obj = clone $this;
        $obj->timezoneSource = $timezoneSource;

        return $obj;
    }
}
