<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicAdsSearchFilter\FilterType;

/**
 * @phpstan-type PublicAdsSearchFilterShape = array{
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
    /** @use SdkModel<PublicAdsSearchFilterShape> */
    use SdkModel;

    #[Required]
    public string $adNetwork;

    #[Required]
    public string $entityType;

    /** @var value-of<FilterType> $filterType */
    #[Required(enum: FilterType::class)]
    public string $filterType;

    #[Required]
    public string $operator;

    /** @var list<string> $searchTerms */
    #[Required(list: 'string')]
    public array $searchTerms;

    #[Required]
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
        $self = new self;

        $self['adNetwork'] = $adNetwork;
        $self['entityType'] = $entityType;
        $self['filterType'] = $filterType;
        $self['operator'] = $operator;
        $self['searchTerms'] = $searchTerms;
        $self['searchTermType'] = $searchTermType;

        return $self;
    }

    public function withAdNetwork(string $adNetwork): self
    {
        $self = clone $this;
        $self['adNetwork'] = $adNetwork;

        return $self;
    }

    public function withEntityType(string $entityType): self
    {
        $self = clone $this;
        $self['entityType'] = $entityType;

        return $self;
    }

    /**
     * @param FilterType|value-of<FilterType> $filterType
     */
    public function withFilterType(FilterType|string $filterType): self
    {
        $self = clone $this;
        $self['filterType'] = $filterType;

        return $self;
    }

    public function withOperator(string $operator): self
    {
        $self = clone $this;
        $self['operator'] = $operator;

        return $self;
    }

    /**
     * @param list<string> $searchTerms
     */
    public function withSearchTerms(array $searchTerms): self
    {
        $self = clone $this;
        $self['searchTerms'] = $searchTerms;

        return $self;
    }

    public function withSearchTermType(string $searchTermType): self
    {
        $self = clone $this;
        $self['searchTermType'] = $searchTermType;

        return $self;
    }
}
