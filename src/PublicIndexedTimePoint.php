<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicIndexedTimePoint\TimeType;

/**
 * @phpstan-type PublicIndexedTimePointShape = array{
 *   indexReference: PublicNowReference|PublicTodayReference|PublicWeekReference|PublicFiscalQuarterReference|PublicFiscalYearReference|PublicYearReference|PublicQuarterReference|PublicMonthReference,
 *   timeType: value-of<TimeType>,
 *   zoneID: string,
 *   offset?: PublicIndexOffset,
 *   timezoneSource?: string,
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

    #[Api('zoneId')]
    public string $zoneID;

    #[Api(optional: true)]
    public ?PublicIndexOffset $offset;

    #[Api(optional: true)]
    public ?string $timezoneSource;

    /**
     * `new PublicIndexedTimePoint()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicIndexedTimePoint::with(indexReference: ..., timeType: ..., zoneID: ...)
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
     * @param TimeType|value-of<TimeType> $timeType
     */
    public static function with(
        PublicNowReference|PublicTodayReference|PublicWeekReference|PublicFiscalQuarterReference|PublicFiscalYearReference|PublicYearReference|PublicQuarterReference|PublicMonthReference $indexReference,
        string $zoneID,
        TimeType|string $timeType = 'INDEXED',
        ?PublicIndexOffset $offset = null,
        ?string $timezoneSource = null,
    ): self {
        $obj = new self;

        $obj->indexReference = $indexReference;
        $obj['timeType'] = $timeType;
        $obj->zoneID = $zoneID;

        null !== $offset && $obj->offset = $offset;
        null !== $timezoneSource && $obj->timezoneSource = $timezoneSource;

        return $obj;
    }

    public function withIndexReference(
        PublicNowReference|PublicTodayReference|PublicWeekReference|PublicFiscalQuarterReference|PublicFiscalYearReference|PublicYearReference|PublicQuarterReference|PublicMonthReference $indexReference,
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

    public function withZoneID(string $zoneID): self
    {
        $obj = clone $this;
        $obj->zoneID = $zoneID;

        return $obj;
    }

    public function withOffset(PublicIndexOffset $offset): self
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
