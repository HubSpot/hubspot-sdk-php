<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Lists\PublicAdsTimeFilter\FilterType;

/**
 * @phpstan-import-type PruningRefineByVariants from \HubspotSDK\Crm\Lists\PublicAdsTimeFilter\PruningRefineBy
 * @phpstan-import-type PruningRefineByShape from \HubspotSDK\Crm\Lists\PublicAdsTimeFilter\PruningRefineBy
 *
 * @phpstan-type PublicAdsTimeFilterShape = array{
 *   filterType: FilterType|value-of<FilterType>,
 *   pruningRefineBy: PruningRefineByShape,
 * }
 */
final class PublicAdsTimeFilter implements BaseModel
{
    /** @use SdkModel<PublicAdsTimeFilterShape> */
    use SdkModel;

    /**
     * Filter type (ADS_TIME).
     *
     * @var value-of<FilterType> $filterType
     */
    #[Required(enum: FilterType::class)]
    public string $filterType;

    /**
     * Refinement criteria.
     *
     * @var PruningRefineByVariants $pruningRefineBy
     */
    #[Required]
    public PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation $pruningRefineBy;

    /**
     * `new PublicAdsTimeFilter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicAdsTimeFilter::with(filterType: ..., pruningRefineBy: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicAdsTimeFilter)->withFilterType(...)->withPruningRefineBy(...)
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
     * @param PruningRefineByShape $pruningRefineBy
     * @param FilterType|value-of<FilterType> $filterType
     */
    public static function with(
        PublicNumOccurrencesRefineBy|array|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation $pruningRefineBy,
        FilterType|string $filterType = 'ADS_TIME',
    ): self {
        $self = new self;

        $self['filterType'] = $filterType;
        $self['pruningRefineBy'] = $pruningRefineBy;

        return $self;
    }

    /**
     * Filter type (ADS_TIME).
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
     * Refinement criteria.
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
