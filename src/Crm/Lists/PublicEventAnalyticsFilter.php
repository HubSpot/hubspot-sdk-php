<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Lists\PublicEventAnalyticsFilter\FilterType;

/**
 * @phpstan-import-type CoalescingRefineByVariants from \HubspotSDK\Crm\Lists\PublicEventAnalyticsFilter\CoalescingRefineBy
 * @phpstan-import-type PruningRefineByVariants from \HubspotSDK\Crm\Lists\PublicEventAnalyticsFilter\PruningRefineBy
 * @phpstan-import-type CoalescingRefineByShape from \HubspotSDK\Crm\Lists\PublicEventAnalyticsFilter\CoalescingRefineBy
 * @phpstan-import-type PruningRefineByShape from \HubspotSDK\Crm\Lists\PublicEventAnalyticsFilter\PruningRefineBy
 *
 * @phpstan-type PublicEventAnalyticsFilterShape = array{
 *   eventID: string,
 *   filterType: FilterType|value-of<FilterType>,
 *   operator: string,
 *   coalescingRefineBy?: CoalescingRefineByShape|null,
 *   pruningRefineBy?: PruningRefineByShape|null,
 * }
 */
final class PublicEventAnalyticsFilter implements BaseModel
{
    /** @use SdkModel<PublicEventAnalyticsFilterShape> */
    use SdkModel;

    /**
     * The ID of the event to be used in the filter.
     */
    #[Required('eventId')]
    public string $eventID;

    /**
     * Indicates the type of filter being applied (EVENT).
     *
     * @var value-of<FilterType> $filterType
     */
    #[Required(enum: FilterType::class)]
    public string $filterType;

    /**
     * Defines the operation to be applied within the event filter (HAS_EVENT, NOT_HAS_EVENT).
     */
    #[Required]
    public string $operator;

    /**
     * Specifies the criteria for refining the event filter by coalescing.
     *
     * @var CoalescingRefineByVariants|null $coalescingRefineBy
     */
    #[Optional]
    public PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null $coalescingRefineBy;

    /**
     * Specifies the criteria for refining the event filter by pruning.
     *
     * @var PruningRefineByVariants|null $pruningRefineBy
     */
    #[Optional]
    public PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null $pruningRefineBy;

    /**
     * `new PublicEventAnalyticsFilter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicEventAnalyticsFilter::with(eventID: ..., filterType: ..., operator: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicEventAnalyticsFilter)
     *   ->withEventID(...)
     *   ->withFilterType(...)
     *   ->withOperator(...)
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
     * @param FilterType|value-of<FilterType> $filterType
     * @param CoalescingRefineByShape|null $coalescingRefineBy
     * @param PruningRefineByShape|null $pruningRefineBy
     */
    public static function with(
        string $eventID,
        string $operator,
        FilterType|string $filterType = 'EVENT',
        PublicNumOccurrencesRefineBy|array|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null $coalescingRefineBy = null,
        PublicNumOccurrencesRefineBy|array|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null $pruningRefineBy = null,
    ): self {
        $self = new self;

        $self['eventID'] = $eventID;
        $self['filterType'] = $filterType;
        $self['operator'] = $operator;

        null !== $coalescingRefineBy && $self['coalescingRefineBy'] = $coalescingRefineBy;
        null !== $pruningRefineBy && $self['pruningRefineBy'] = $pruningRefineBy;

        return $self;
    }

    /**
     * The ID of the event to be used in the filter.
     */
    public function withEventID(string $eventID): self
    {
        $self = clone $this;
        $self['eventID'] = $eventID;

        return $self;
    }

    /**
     * Indicates the type of filter being applied (EVENT).
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
     * Defines the operation to be applied within the event filter (HAS_EVENT, NOT_HAS_EVENT).
     */
    public function withOperator(string $operator): self
    {
        $self = clone $this;
        $self['operator'] = $operator;

        return $self;
    }

    /**
     * Specifies the criteria for refining the event filter by coalescing.
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
     * Specifies the criteria for refining the event filter by pruning.
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
