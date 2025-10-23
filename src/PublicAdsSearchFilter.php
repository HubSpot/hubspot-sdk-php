<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicAdsSearchFilter\FilterType;

/**
 * @phpstan-type public_ads_search_filter = array{
 *   adNetwork: string,
 *   entityType: string,
 *   filterType: value-of<FilterType>,
 *   operator: string,
 *   searchTerms: list<string>,
 *   searchTermType: string,
 * }
 */
final class PublicAdsSearchFilter implements BaseModel
{
    /** @use SdkModel<public_ads_search_filter> */
    use SdkModel;

    #[Api]
    public string $adNetwork;

    #[Api]
    public string $entityType;

    /** @var value-of<FilterType> $filterType */
    #[Api(enum: FilterType::class)]
    public string $filterType;

    #[Api]
    public string $operator;

    /** @var list<string> $searchTerms */
    #[Api(list: 'string')]
    public array $searchTerms;

    #[Api]
    public string $searchTermType;

    /**
     * `new PublicAdsSearchFilter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicAdsSearchFilter::with(
     *   adNetwork: ...,
     *   entityType: ...,
     *   filterType: ...,
     *   operator: ...,
     *   searchTerms: ...,
     *   searchTermType: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicAdsSearchFilter)
     *   ->withAdNetwork(...)
     *   ->withEntityType(...)
     *   ->withFilterType(...)
     *   ->withOperator(...)
     *   ->withSearchTerms(...)
     *   ->withSearchTermType(...)
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
     * @param list<string> $searchTerms
     * @param FilterType|value-of<FilterType> $filterType
     */
    public static function with(
        string $adNetwork,
        string $entityType,
        string $operator,
        array $searchTerms,
        string $searchTermType,
        FilterType|string $filterType = 'ADS_SEARCH',
    ): self {
        $obj = new self;

        $obj->adNetwork = $adNetwork;
        $obj->entityType = $entityType;
        $obj['filterType'] = $filterType;
        $obj->operator = $operator;
        $obj->searchTerms = $searchTerms;
        $obj->searchTermType = $searchTermType;

        return $obj;
    }

    public function withAdNetwork(string $adNetwork): self
    {
        $obj = clone $this;
        $obj->adNetwork = $adNetwork;

        return $obj;
    }

    public function withEntityType(string $entityType): self
    {
        $obj = clone $this;
        $obj->entityType = $entityType;

        return $obj;
    }

    /**
     * @param FilterType|value-of<FilterType> $filterType
     */
    public function withFilterType(FilterType|string $filterType): self
    {
        $obj = clone $this;
        $obj['filterType'] = $filterType;

        return $obj;
    }

    public function withOperator(string $operator): self
    {
        $obj = clone $this;
        $obj->operator = $operator;

        return $obj;
    }

    /**
     * @param list<string> $searchTerms
     */
    public function withSearchTerms(array $searchTerms): self
    {
        $obj = clone $this;
        $obj->searchTerms = $searchTerms;

        return $obj;
    }

    public function withSearchTermType(string $searchTermType): self
    {
        $obj = clone $this;
        $obj->searchTermType = $searchTermType;

        return $obj;
    }
}
