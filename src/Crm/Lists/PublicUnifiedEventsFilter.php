<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Lists\PublicUnifiedEventsFilter\FilterType;

/**
 * @phpstan-import-type CoalescingRefineByVariants from \HubSpotSDK\Crm\Lists\PublicUnifiedEventsFilter\CoalescingRefineBy
 * @phpstan-import-type PruningRefineByVariants from \HubSpotSDK\Crm\Lists\PublicUnifiedEventsFilter\PruningRefineBy
 * @phpstan-import-type PublicEventFilterMetadataShape from \HubSpotSDK\Crm\Lists\PublicEventFilterMetadata
 * @phpstan-import-type CoalescingRefineByShape from \HubSpotSDK\Crm\Lists\PublicUnifiedEventsFilter\CoalescingRefineBy
 * @phpstan-import-type PruningRefineByShape from \HubSpotSDK\Crm\Lists\PublicUnifiedEventsFilter\PruningRefineBy
 *
 * @phpstan-type PublicUnifiedEventsFilterShape = array{
 *   filterLines: list<PublicEventFilterMetadata|PublicEventFilterMetadataShape>,
 *   filterType: FilterType|value-of<FilterType>,
 *   coalescingRefineBy?: CoalescingRefineByShape|null,
 *   eventTypeID?: string|null,
 *   pruningRefineBy?: PruningRefineByShape|null,
 * }
 */
final class PublicUnifiedEventsFilter implements BaseModel
{
    /** @use SdkModel<PublicUnifiedEventsFilterShape> */
    use SdkModel;

    /** @var list<PublicEventFilterMetadata> $filterLines */
    #[Required(list: PublicEventFilterMetadata::class)]
    public array $filterLines;

    /**
     * Indicates the type of filter being applied (UNIFIED_EVENTS).
     *
     * @var value-of<FilterType> $filterType
     */
    #[Required(enum: FilterType::class)]
    public string $filterType;

    /**
     * Specifies the criteria for refining the filter by coalescing.
     *
     * @var CoalescingRefineByVariants|null $coalescingRefineBy
     */
    #[Optional]
    public PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null $coalescingRefineBy;

    /**
     * The identifier for the type of event in the unified events filter.
     */
    #[Optional('eventTypeId')]
    public ?string $eventTypeID;

    /**
     * Specifies the criteria for refining the filter by pruning.
     *
     * @var PruningRefineByVariants|null $pruningRefineBy
     */
    #[Optional]
    public PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null $pruningRefineBy;

    /**
     * `new PublicUnifiedEventsFilter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicUnifiedEventsFilter::with(filterLines: ..., filterType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicUnifiedEventsFilter)->withFilterLines(...)->withFilterType(...)
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
     * @param list<PublicEventFilterMetadata|PublicEventFilterMetadataShape> $filterLines
     * @param FilterType|value-of<FilterType> $filterType
     * @param CoalescingRefineByShape|null $coalescingRefineBy
     * @param PruningRefineByShape|null $pruningRefineBy
     */
    public static function with(
        array $filterLines,
        FilterType|string $filterType = 'UNIFIED_EVENTS',
        PublicNumOccurrencesRefineBy|array|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null $coalescingRefineBy = null,
        ?string $eventTypeID = null,
        PublicNumOccurrencesRefineBy|array|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null $pruningRefineBy = null,
    ): self {
        $self = new self;

        $self['filterLines'] = $filterLines;
        $self['filterType'] = $filterType;

        null !== $coalescingRefineBy && $self['coalescingRefineBy'] = $coalescingRefineBy;
        null !== $eventTypeID && $self['eventTypeID'] = $eventTypeID;
        null !== $pruningRefineBy && $self['pruningRefineBy'] = $pruningRefineBy;

        return $self;
    }

    /**
     * @param list<PublicEventFilterMetadata|PublicEventFilterMetadataShape> $filterLines
     */
    public function withFilterLines(array $filterLines): self
    {
        $self = clone $this;
        $self['filterLines'] = $filterLines;

        return $self;
    }

    /**
     * Indicates the type of filter being applied (UNIFIED_EVENTS).
     *
     * @param FilterType|value-of<FilterType> $filterType
     */
    public function withFilterType(FilterType|string $filterType): self
    {
        $self = clone $this;
        $self['filterType'] = $filterType;

        return $self;
    }

    /**
     * Specifies the criteria for refining the filter by coalescing.
     *
     * @param CoalescingRefineByShape $coalescingRefineBy
     */
    public function withCoalescingRefineBy(
        PublicNumOccurrencesRefineBy|array|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation $coalescingRefineBy,
    ): self {
        $self = clone $this;
        $self['coalescingRefineBy'] = $coalescingRefineBy;

        return $self;
    }

    /**
     * The identifier for the type of event in the unified events filter.
     */
    public function withEventTypeID(string $eventTypeID): self
    {
        $self = clone $this;
        $self['eventTypeID'] = $eventTypeID;

        return $self;
    }

    /**
     * Specifies the criteria for refining the filter by pruning.
     *
     * @param PruningRefineByShape $pruningRefineBy
     */
    public function withPruningRefineBy(
        PublicNumOccurrencesRefineBy|array|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation $pruningRefineBy,
    ): self {
        $self = clone $this;
        $self['pruningRefineBy'] = $pruningRefineBy;

        return $self;
    }
}
