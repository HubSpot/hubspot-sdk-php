<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Lists\PublicPageViewAnalyticsFilter\FilterType;

/**
 * @phpstan-import-type CoalescingRefineByVariants from \HubspotSDK\Crm\Lists\PublicPageViewAnalyticsFilter\CoalescingRefineBy
 * @phpstan-import-type PruningRefineByVariants from \HubspotSDK\Crm\Lists\PublicPageViewAnalyticsFilter\PruningRefineBy
 * @phpstan-import-type CoalescingRefineByShape from \HubspotSDK\Crm\Lists\PublicPageViewAnalyticsFilter\CoalescingRefineBy
 * @phpstan-import-type PruningRefineByShape from \HubspotSDK\Crm\Lists\PublicPageViewAnalyticsFilter\PruningRefineBy
 *
 * @phpstan-type PublicPageViewAnalyticsFilterShape = array{
 *   filterType: FilterType|value-of<FilterType>,
 *   operator: string,
 *   pageURL: string,
 *   coalescingRefineBy?: CoalescingRefineByShape|null,
 *   enableTracking?: bool|null,
 *   pruningRefineBy?: PruningRefineByShape|null,
 * }
 */
final class PublicPageViewAnalyticsFilter implements BaseModel
{
    /** @use SdkModel<PublicPageViewAnalyticsFilterShape> */
    use SdkModel;

    /**
     * Indicates the type of filter being applied (PAGE_VIEW).
     *
     * @var value-of<FilterType> $filterType
     */
    #[Required(enum: FilterType::class)]
    public string $filterType;

    /**
     * Defines the operation to be applied within the filter (HAS_PAGEVIEW_EQ, HAS_PAGEVIEW_CONTAINS, HAS_PAGEVIEW_MATCHES_REGEX, NOT_HAS_PAGEVIEW_EQ, NOT_HAS_PAGEVIEW_CONTAINS).
     */
    #[Required]
    public string $operator;

    /**
     * The URL of the page to be used in the filter.
     */
    #[Required('pageUrl')]
    public string $pageURL;

    /**
     * Specifies the criteria for refining the filter by coalescing.
     *
     * @var CoalescingRefineByVariants|null $coalescingRefineBy
     */
    #[Optional]
    public PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null $coalescingRefineBy;

    /**
     * Indicates whether tracking is enabled for the page view.
     */
    #[Optional]
    public ?bool $enableTracking;

    /**
     * Specifies the criteria for refining the filter by pruning.
     *
     * @var PruningRefineByVariants|null $pruningRefineBy
     */
    #[Optional]
    public PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null $pruningRefineBy;

    /**
     * `new PublicPageViewAnalyticsFilter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicPageViewAnalyticsFilter::with(
     *   filterType: ..., operator: ..., pageURL: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicPageViewAnalyticsFilter)
     *   ->withFilterType(...)
     *   ->withOperator(...)
     *   ->withPageURL(...)
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
        string $operator,
        string $pageURL,
        FilterType|string $filterType = 'PAGE_VIEW',
        PublicNumOccurrencesRefineBy|array|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null $coalescingRefineBy = null,
        ?bool $enableTracking = null,
        PublicNumOccurrencesRefineBy|array|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null $pruningRefineBy = null,
    ): self {
        $self = new self;

        $self['filterType'] = $filterType;
        $self['operator'] = $operator;
        $self['pageURL'] = $pageURL;

        null !== $coalescingRefineBy && $self['coalescingRefineBy'] = $coalescingRefineBy;
        null !== $enableTracking && $self['enableTracking'] = $enableTracking;
        null !== $pruningRefineBy && $self['pruningRefineBy'] = $pruningRefineBy;

        return $self;
    }

    /**
     * Indicates the type of filter being applied (PAGE_VIEW).
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
     * Defines the operation to be applied within the filter (HAS_PAGEVIEW_EQ, HAS_PAGEVIEW_CONTAINS, HAS_PAGEVIEW_MATCHES_REGEX, NOT_HAS_PAGEVIEW_EQ, NOT_HAS_PAGEVIEW_CONTAINS).
     */
    public function withOperator(string $operator): self
    {
        $self = clone $this;
        $self['operator'] = $operator;

        return $self;
    }

    /**
     * The URL of the page to be used in the filter.
     */
    public function withPageURL(string $pageURL): self
    {
        $self = clone $this;
        $self['pageURL'] = $pageURL;

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
     * Indicates whether tracking is enabled for the page view.
     */
    public function withEnableTracking(bool $enableTracking): self
    {
        $self = clone $this;
        $self['enableTracking'] = $enableTracking;

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
