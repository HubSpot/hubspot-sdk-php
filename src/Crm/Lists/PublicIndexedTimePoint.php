<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Lists\PublicIndexedTimePoint\TimeType;

/**
 * @phpstan-import-type IndexReferenceVariants from \HubSpotSDK\Crm\Lists\PublicIndexedTimePoint\IndexReference
 * @phpstan-import-type IndexReferenceShape from \HubSpotSDK\Crm\Lists\PublicIndexedTimePoint\IndexReference
 * @phpstan-import-type PublicIndexOffsetShape from \HubSpotSDK\Crm\Lists\PublicIndexOffset
 *
 * @phpstan-type PublicIndexedTimePointShape = array{
 *   indexReference: IndexReferenceShape,
 *   timeType: TimeType|value-of<TimeType>,
 *   zoneID: string,
 *   offset?: null|PublicIndexOffset|PublicIndexOffsetShape,
 *   timezoneSource?: string|null,
 * }
 */
final class PublicIndexedTimePoint implements BaseModel
{
    /** @use SdkModel<PublicIndexedTimePointShape> */
    use SdkModel;

    /**
     * Specifies the reference point in time for the indexed time point.
     *
     * @var IndexReferenceVariants $indexReference
     */
    #[Required]
    public PublicNowReference|PublicTodayReference|PublicWeekReference|PublicFiscalQuarterReference|PublicFiscalYearReference|PublicYearReference|PublicQuarterReference|PublicMonthReference $indexReference;

    /**
     * Defines the type of time (INDEXED).
     *
     * @var value-of<TimeType> $timeType
     */
    #[Required(enum: TimeType::class)]
    public string $timeType;

    /**
     * Indicates the identifier for the time zone associated with the indexed time point.
     */
    #[Required('zoneId')]
    public string $zoneID;

    #[Optional]
    public ?PublicIndexOffset $offset;

    /**
     * Specifies the source of the time zone information for the indexed time point (CUSTOM, USER, PORTAL).
     */
    #[Optional]
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
     * @param IndexReferenceShape $indexReference
     * @param TimeType|value-of<TimeType> $timeType
     * @param PublicIndexOffset|PublicIndexOffsetShape|null $offset
     */
    public static function with(
        PublicNowReference|array|PublicTodayReference|PublicWeekReference|PublicFiscalQuarterReference|PublicFiscalYearReference|PublicYearReference|PublicQuarterReference|PublicMonthReference $indexReference,
        string $zoneID,
        TimeType|string $timeType = 'INDEXED',
        PublicIndexOffset|array|null $offset = null,
        ?string $timezoneSource = null,
    ): self {
        $self = new self;

        $self['indexReference'] = $indexReference;
        $self['timeType'] = $timeType;
        $self['zoneID'] = $zoneID;

        null !== $offset && $self['offset'] = $offset;
        null !== $timezoneSource && $self['timezoneSource'] = $timezoneSource;

        return $self;
    }

    /**
     * Specifies the reference point in time for the indexed time point.
     *
     * @param IndexReferenceShape $indexReference
     */
    public function withIndexReference(
        PublicNowReference|array|PublicTodayReference|PublicWeekReference|PublicFiscalQuarterReference|PublicFiscalYearReference|PublicYearReference|PublicQuarterReference|PublicMonthReference $indexReference,
    ): self {
        $self = clone $this;
        $self['indexReference'] = $indexReference;

        return $self;
    }

    /**
     * Defines the type of time (INDEXED).
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
     * Indicates the identifier for the time zone associated with the indexed time point.
     */
    public function withZoneID(string $zoneID): self
    {
        $self = clone $this;
        $self['zoneID'] = $zoneID;

        return $self;
    }

    /**
     * @param PublicIndexOffset|PublicIndexOffsetShape $offset
     */
    public function withOffset(PublicIndexOffset|array $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }

    /**
     * Specifies the source of the time zone information for the indexed time point (CUSTOM, USER, PORTAL).
     */
    public function withTimezoneSource(string $timezoneSource): self
    {
        $self = clone $this;
        $self['timezoneSource'] = $timezoneSource;

        return $self;
    }
}
