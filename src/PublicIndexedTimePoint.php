<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicIndexedTimePoint\TimeType;
use HubspotSDK\PublicNowReference\ReferenceType;
use HubspotSDK\PublicWeekReference\DayOfWeek;

/**
 * @phpstan-type PublicIndexedTimePointShape = array{
 *   indexReference: PublicNowReference|PublicTodayReference|PublicWeekReference|PublicFiscalQuarterReference|PublicFiscalYearReference|PublicYearReference|PublicQuarterReference|PublicMonthReference,
 *   timeType: value-of<TimeType>,
 *   zoneId: string,
 *   offset?: PublicIndexOffset|null,
 *   timezoneSource?: string|null,
 * }
 */
final class PublicIndexedTimePoint implements BaseModel
{
    /** @use SdkModel<PublicIndexedTimePointShape> */
    use SdkModel;

    #[Api]
    public PublicNowReference|PublicTodayReference|PublicWeekReference|PublicFiscalQuarterReference|PublicFiscalYearReference|PublicYearReference|PublicQuarterReference|PublicMonthReference $indexReference;

    /** @var value-of<TimeType> $timeType */
    #[Api(enum: TimeType::class)]
    public string $timeType;

    #[Api]
    public string $zoneId;

    #[Api(optional: true)]
    public ?PublicIndexOffset $offset;

    #[Api(optional: true)]
    public ?string $timezoneSource;

    /**
     * `new PublicIndexedTimePoint()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicIndexedTimePoint::with(indexReference: ..., timeType: ..., zoneId: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicIndexedTimePoint)
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
     * @param PublicNowReference|array{
     *   referenceType: value-of<ReferenceType>,
     *   hour?: int|null,
     *   millisecond?: int|null,
     *   minute?: int|null,
     *   second?: int|null,
     * }|PublicTodayReference|array{
     *   referenceType: value-of<PublicTodayReference\ReferenceType>,
     *   hour?: int|null,
     *   millisecond?: int|null,
     *   minute?: int|null,
     *   second?: int|null,
     * }|PublicWeekReference|array{
     *   dayOfWeek: value-of<DayOfWeek>,
     *   referenceType: value-of<PublicWeekReference\ReferenceType>,
     *   hour?: int|null,
     *   millisecond?: int|null,
     *   minute?: int|null,
     *   second?: int|null,
     * }|PublicFiscalQuarterReference|array{
     *   day: int,
     *   month: int,
     *   referenceType: value-of<PublicFiscalQuarterReference\ReferenceType>,
     *   hour?: int|null,
     *   millisecond?: int|null,
     *   minute?: int|null,
     *   second?: int|null,
     * }|PublicFiscalYearReference|array{
     *   day: int,
     *   month: int,
     *   referenceType: value-of<PublicFiscalYearReference\ReferenceType>,
     *   hour?: int|null,
     *   millisecond?: int|null,
     *   minute?: int|null,
     *   second?: int|null,
     * }|PublicYearReference|array{
     *   day: int,
     *   month: int,
     *   referenceType: value-of<PublicYearReference\ReferenceType>,
     *   hour?: int|null,
     *   millisecond?: int|null,
     *   minute?: int|null,
     *   second?: int|null,
     * }|PublicQuarterReference|array{
     *   day: int,
     *   month: int,
     *   referenceType: value-of<PublicQuarterReference\ReferenceType>,
     *   hour?: int|null,
     *   millisecond?: int|null,
     *   minute?: int|null,
     *   second?: int|null,
     * }|PublicMonthReference|array{
     *   day: int,
     *   referenceType: value-of<PublicMonthReference\ReferenceType>,
     *   hour?: int|null,
     *   millisecond?: int|null,
     *   minute?: int|null,
     *   second?: int|null,
     * } $indexReference
     * @param TimeType|value-of<TimeType> $timeType
     * @param PublicIndexOffset|array{
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
        PublicNowReference|array|PublicTodayReference|PublicWeekReference|PublicFiscalQuarterReference|PublicFiscalYearReference|PublicYearReference|PublicQuarterReference|PublicMonthReference $indexReference,
        string $zoneId,
        TimeType|string $timeType = 'INDEXED',
        PublicIndexOffset|array|null $offset = null,
        ?string $timezoneSource = null,
    ): self {
        $obj = new self;

        $obj['indexReference'] = $indexReference;
        $obj['timeType'] = $timeType;
        $obj['zoneId'] = $zoneId;

        null !== $offset && $obj['offset'] = $offset;
        null !== $timezoneSource && $obj['timezoneSource'] = $timezoneSource;

        return $obj;
    }

    /**
     * @param PublicNowReference|array{
     *   referenceType: value-of<ReferenceType>,
     *   hour?: int|null,
     *   millisecond?: int|null,
     *   minute?: int|null,
     *   second?: int|null,
     * }|PublicTodayReference|array{
     *   referenceType: value-of<PublicTodayReference\ReferenceType>,
     *   hour?: int|null,
     *   millisecond?: int|null,
     *   minute?: int|null,
     *   second?: int|null,
     * }|PublicWeekReference|array{
     *   dayOfWeek: value-of<DayOfWeek>,
     *   referenceType: value-of<PublicWeekReference\ReferenceType>,
     *   hour?: int|null,
     *   millisecond?: int|null,
     *   minute?: int|null,
     *   second?: int|null,
     * }|PublicFiscalQuarterReference|array{
     *   day: int,
     *   month: int,
     *   referenceType: value-of<PublicFiscalQuarterReference\ReferenceType>,
     *   hour?: int|null,
     *   millisecond?: int|null,
     *   minute?: int|null,
     *   second?: int|null,
     * }|PublicFiscalYearReference|array{
     *   day: int,
     *   month: int,
     *   referenceType: value-of<PublicFiscalYearReference\ReferenceType>,
     *   hour?: int|null,
     *   millisecond?: int|null,
     *   minute?: int|null,
     *   second?: int|null,
     * }|PublicYearReference|array{
     *   day: int,
     *   month: int,
     *   referenceType: value-of<PublicYearReference\ReferenceType>,
     *   hour?: int|null,
     *   millisecond?: int|null,
     *   minute?: int|null,
     *   second?: int|null,
     * }|PublicQuarterReference|array{
     *   day: int,
     *   month: int,
     *   referenceType: value-of<PublicQuarterReference\ReferenceType>,
     *   hour?: int|null,
     *   millisecond?: int|null,
     *   minute?: int|null,
     *   second?: int|null,
     * }|PublicMonthReference|array{
     *   day: int,
     *   referenceType: value-of<PublicMonthReference\ReferenceType>,
     *   hour?: int|null,
     *   millisecond?: int|null,
     *   minute?: int|null,
     *   second?: int|null,
     * } $indexReference
     */
    public function withIndexReference(
        PublicNowReference|array|PublicTodayReference|PublicWeekReference|PublicFiscalQuarterReference|PublicFiscalYearReference|PublicYearReference|PublicQuarterReference|PublicMonthReference $indexReference,
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

    public function withZoneID(string $zoneID): self
    {
        $obj = clone $this;
        $obj['zoneId'] = $zoneID;

        return $obj;
    }

    /**
     * @param PublicIndexOffset|array{
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
    public function withOffset(PublicIndexOffset|array $offset): self
    {
        $obj = clone $this;
        $obj['offset'] = $offset;

        return $obj;
    }

    public function withTimezoneSource(string $timezoneSource): self
    {
        $obj = clone $this;
        $obj['timezoneSource'] = $timezoneSource;

        return $obj;
    }
}
