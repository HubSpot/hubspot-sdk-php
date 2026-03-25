<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Lists\PublicAndFilterBranch\Filter;
use HubspotSDK\Crm\Lists\PublicAndFilterBranch\FilterBranch;
use HubspotSDK\Crm\Lists\PublicAndFilterBranch\FilterBranchType;

/**
 * @phpstan-import-type FilterVariants from \HubspotSDK\Crm\Lists\PublicAndFilterBranch\Filter
 * @phpstan-import-type FilterShape from \HubspotSDK\Crm\Lists\PublicAndFilterBranch\Filter
 *
 * @phpstan-type PublicAndFilterBranchShape = array{
 *   filterBranches: list<mixed>,
 *   filterBranchOperator: string,
 *   filterBranchType: FilterBranchType|value-of<FilterBranchType>,
 *   filters: list<FilterShape>,
 * }
 */
final class PublicAndFilterBranch implements BaseModel
{
    /** @use SdkModel<PublicAndFilterBranchShape> */
    use SdkModel;

    /** @var list<mixed> $filterBranches */
    #[Required(list: FilterBranch::class)]
    public array $filterBranches;

    /**
     * Filter branch operator (AND).
     */
    #[Required]
    public string $filterBranchOperator;

    /**
     * Type of filter branch (AND).
     *
     * @var value-of<FilterBranchType> $filterBranchType
     */
    #[Required(enum: FilterBranchType::class)]
    public string $filterBranchType;

    /** @var list<FilterVariants> $filters */
    #[Required(list: Filter::class)]
    public array $filters;

    /**
     * `new PublicAndFilterBranch()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicAndFilterBranch::with(
     *   filterBranches: ...,
     *   filterBranchOperator: ...,
     *   filterBranchType: ...,
     *   filters: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicAndFilterBranch)
     *   ->withFilterBranches(...)
     *   ->withFilterBranchOperator(...)
     *   ->withFilterBranchType(...)
     *   ->withFilters(...)
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
     * @param FilterBranchType|value-of<FilterBranchType> $filterBranchType
     */
    public static function with(
        array $filterBranches,
        string $filterBranchOperator,
        array $filters,
        FilterBranchType|string $filterBranchType = 'AND',
    ): self {
        $self = new self;

        $self['filterBranches'] = $filterBranches;
        $self['filterBranchOperator'] = $filterBranchOperator;
        $self['filterBranchType'] = $filterBranchType;
        $self['filters'] = $filters;

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

    /**
     * Filter branch operator (AND).
     */
    public function withFilterBranchOperator(string $filterBranchOperator): self
    {
        $self = clone $this;
        $self['filterBranchOperator'] = $filterBranchOperator;

        return $self;
    }

    /**
     * Type of filter branch (AND).
     *
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
}
