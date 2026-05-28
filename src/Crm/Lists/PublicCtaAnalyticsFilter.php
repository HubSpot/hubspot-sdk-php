<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Lists\PublicCtaAnalyticsFilter\CoalescingRefineBy;
use HubSpotSDK\Crm\Lists\PublicCtaAnalyticsFilter\FilterType;
use HubSpotSDK\Crm\Lists\PublicCtaAnalyticsFilter\PruningRefineBy;

/**
 * @phpstan-import-type CoalescingRefineByVariants from \HubSpotSDK\Crm\Lists\PublicCtaAnalyticsFilter\CoalescingRefineBy
 * @phpstan-import-type PruningRefineByVariants from \HubSpotSDK\Crm\Lists\PublicCtaAnalyticsFilter\PruningRefineBy
 * @phpstan-import-type CoalescingRefineByShape from \HubSpotSDK\Crm\Lists\PublicCtaAnalyticsFilter\CoalescingRefineBy
 * @phpstan-import-type PruningRefineByShape from \HubSpotSDK\Crm\Lists\PublicCtaAnalyticsFilter\PruningRefineBy
 *
 * @phpstan-type PublicCtaAnalyticsFilterShape = array{
 *   ctaName: string,
 *   filterType: FilterType|value-of<FilterType>,
 *   operator: string,
 *   coalescingRefineBy?: CoalescingRefineByShape|null,
 *   pruningRefineBy?: PruningRefineByShape|null,
 * }
 */
final class PublicCtaAnalyticsFilter implements BaseModel
{
    /** @use SdkModel<PublicCtaAnalyticsFilterShape> */
    use SdkModel;

    /**
     * The name of the Call-to-Action (CTA) to be used in the filter.
     */
    #[Required]
    public string $ctaName;

    /**
     * Indicates the type of filter being applied, which is (CTA).
     *
     * @var value-of<FilterType> $filterType
     */
    #[Required(enum: FilterType::class)]
    public string $filterType;

    /**
     * Defines the operation to be applied within the filter (HAS_CLICKED_CTA, HAS_NOT_CLICKED_CTA, HAS_OPENED_CTA, HAS_NOT_OPENED_CTA, HAS_CLICKED_CTA_PLACEMENT, HAS_NOT_CLICKED_CTA_PLACEMENT, HAS_OPENED_CTA_PLACEMENT, HAS_NOT_OPENED_CTA_PLACEMENT).
     */
    #[Required]
    public string $operator;

    /**
     * Specifies the criteria for refining the filter by coalescing.
     *
     * @var CoalescingRefineByVariants|null $coalescingRefineBy
     */
    #[Optional(union: CoalescingRefineBy::class)]
    public PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null $coalescingRefineBy;

    /**
     * Specifies the criteria for refining the filter by pruning.
     *
     * @var PruningRefineByVariants|null $pruningRefineBy
     */
    #[Optional(union: PruningRefineBy::class)]
    public PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null $pruningRefineBy;

    /**
     * `new PublicCtaAnalyticsFilter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicCtaAnalyticsFilter::with(ctaName: ..., filterType: ..., operator: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicCtaAnalyticsFilter)
     *   ->withCtaName(...)
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
        string $ctaName,
        string $operator,
        FilterType|string $filterType = 'CTA',
        PublicNumOccurrencesRefineBy|array|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null $coalescingRefineBy = null,
        PublicNumOccurrencesRefineBy|array|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null $pruningRefineBy = null,
    ): self {
        $self = new self;

        $self['ctaName'] = $ctaName;
        $self['filterType'] = $filterType;
        $self['operator'] = $operator;

        null !== $coalescingRefineBy && $self['coalescingRefineBy'] = $coalescingRefineBy;
        null !== $pruningRefineBy && $self['pruningRefineBy'] = $pruningRefineBy;

        return $self;
    }

    /**
     * The name of the Call-to-Action (CTA) to be used in the filter.
     */
    public function withCtaName(string $ctaName): self
    {
        $self = clone $this;
        $self['ctaName'] = $ctaName;

        return $self;
    }

    /**
     * Indicates the type of filter being applied, which is (CTA).
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
     * Defines the operation to be applied within the filter (HAS_CLICKED_CTA, HAS_NOT_CLICKED_CTA, HAS_OPENED_CTA, HAS_NOT_OPENED_CTA, HAS_CLICKED_CTA_PLACEMENT, HAS_NOT_CLICKED_CTA_PLACEMENT, HAS_OPENED_CTA_PLACEMENT, HAS_NOT_OPENED_CTA_PLACEMENT).
     */
    public function withOperator(string $operator): self
    {
        $self = clone $this;
        $self['operator'] = $operator;

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
