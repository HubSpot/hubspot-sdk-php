<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicUnifiedEventsFilterBranch\Filter;
use HubspotSDK\PublicUnifiedEventsFilterBranch\FilterBranch;
use HubspotSDK\PublicUnifiedEventsFilterBranch\FilterBranchType;
use HubspotSDK\PublicUnifiedEventsFilterBranch\Operator;

/**
 * @phpstan-import-type FilterShape from \HubspotSDK\PublicUnifiedEventsFilterBranch\Filter
 * @phpstan-import-type CoalescingRefineByShape from \HubspotSDK\PublicUnifiedEventsFilterBranch\CoalescingRefineBy
 *
 * @phpstan-type PublicUnifiedEventsFilterBranchShape = array{
 *   eventTypeID: string,
 *   filterBranches: list<mixed>,
 *   filterBranchOperator: string,
 *   filterBranchType: FilterBranchType|value-of<FilterBranchType>,
 *   filters: list<FilterShape>,
 *   operator: Operator|value-of<Operator>,
 *   coalescingRefineBy?: null|CoalescingRefineByShape|PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation,
 * }
 */
final class PublicUnifiedEventsFilterBranch implements BaseModel
{
    /** @use SdkModel<PublicUnifiedEventsFilterBranchShape> */
    use SdkModel;

    #[Required('eventTypeId')]
    public string $eventTypeID;

    /** @var list<mixed> $filterBranches */
    #[Required(list: FilterBranch::class)]
    public array $filterBranches;

    #[Required]
    public string $filterBranchOperator;

    /** @var value-of<FilterBranchType> $filterBranchType */
    #[Required(enum: FilterBranchType::class)]
    public string $filterBranchType;

    /**
     * @var list<PublicPropertyFilter|PublicAssociationInListFilter|PublicPageViewAnalyticsFilter|PublicCtaAnalyticsFilter|PublicEventAnalyticsFilter|PublicFormSubmissionFilter|PublicFormSubmissionOnPageFilter|PublicIntegrationEventFilter|PublicEmailSubscriptionFilter|PublicCommunicationSubscriptionFilter|PublicCampaignInfluencedFilter|PublicSurveyMonkeyFilter|PublicSurveyMonkeyValueFilter|PublicWebinarFilter|PublicEmailEventFilter|PublicPrivacyAnalyticsFilter|PublicAdsSearchFilter|PublicAdsTimeFilter|PublicInListFilter|PublicNumAssociationsFilter|PublicUnifiedEventsFilter|PublicPropertyAssociationInListFilter|PublicConstantFilter> $filters
     */
    #[Required(list: Filter::class)]
    public array $filters;

    /** @var value-of<Operator> $operator */
    #[Required(enum: Operator::class)]
    public string $operator;

    #[Optional]
    public PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null $coalescingRefineBy;

    /**
     * `new PublicUnifiedEventsFilterBranch()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicUnifiedEventsFilterBranch::with(
     *   eventTypeID: ...,
     *   filterBranches: ...,
     *   filterBranchOperator: ...,
     *   filterBranchType: ...,
     *   filters: ...,
     *   operator: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicUnifiedEventsFilterBranch)
     *   ->withEventTypeID(...)
     *   ->withFilterBranches(...)
     *   ->withFilterBranchOperator(...)
     *   ->withFilterBranchType(...)
     *   ->withFilters(...)
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
     * @param list<mixed> $filterBranches
     * @param list<FilterShape> $filters
     * @param Operator|value-of<Operator> $operator
     * @param FilterBranchType|value-of<FilterBranchType> $filterBranchType
     * @param CoalescingRefineByShape $coalescingRefineBy
     */
    public static function with(
        string $eventTypeID,
        array $filterBranches,
        string $filterBranchOperator,
        array $filters,
        Operator|string $operator,
        FilterBranchType|string $filterBranchType = 'UNIFIED_EVENTS',
        PublicNumOccurrencesRefineBy|array|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null $coalescingRefineBy = null,
    ): self {
        $self = new self;

        $self['eventTypeID'] = $eventTypeID;
        $self['filterBranches'] = $filterBranches;
        $self['filterBranchOperator'] = $filterBranchOperator;
        $self['filterBranchType'] = $filterBranchType;
        $self['filters'] = $filters;
        $self['operator'] = $operator;

        null !== $coalescingRefineBy && $self['coalescingRefineBy'] = $coalescingRefineBy;

        return $self;
    }

    public function withEventTypeID(string $eventTypeID): self
    {
        $self = clone $this;
        $self['eventTypeID'] = $eventTypeID;

        return $self;
    }

    /**
     * @param list<mixed> $filterBranches
     */
    public function withFilterBranches(array $filterBranches): self
    {
        $self = clone $this;
        $self['filterBranches'] = $filterBranches;

        return $self;
    }

    public function withFilterBranchOperator(string $filterBranchOperator): self
    {
        $self = clone $this;
        $self['filterBranchOperator'] = $filterBranchOperator;

        return $self;
    }

    /**
     * @param FilterBranchType|value-of<FilterBranchType> $filterBranchType
     */
    public function withFilterBranchType(
        FilterBranchType|string $filterBranchType
    ): self {
        $self = clone $this;
        $self['filterBranchType'] = $filterBranchType;

        return $self;
    }

    /**
     * @param list<FilterShape> $filters
     */
    public function withFilters(array $filters): self
    {
        $self = clone $this;
        $self['filters'] = $filters;

        return $self;
    }

    /**
     * @param Operator|value-of<Operator> $operator
     */
    public function withOperator(Operator|string $operator): self
    {
        $self = clone $this;
        $self['operator'] = $operator;

        return $self;
    }

    /**
     * @param CoalescingRefineByShape $coalescingRefineBy
     */
    public function withCoalescingRefineBy(
        PublicNumOccurrencesRefineBy|array|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation $coalescingRefineBy,
    ): self {
        $self = clone $this;
        $self['coalescingRefineBy'] = $coalescingRefineBy;

        return $self;
    }
}
