<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Lists\PublicAssociationFilterBranch\Filter;
use HubSpotSDK\Crm\Lists\PublicAssociationFilterBranch\FilterBranch;
use HubSpotSDK\Crm\Lists\PublicAssociationFilterBranch\FilterBranchType;

/**
 * @phpstan-import-type FilterVariants from \HubSpotSDK\Crm\Lists\PublicAssociationFilterBranch\Filter
 * @phpstan-import-type FilterShape from \HubSpotSDK\Crm\Lists\PublicAssociationFilterBranch\Filter
 *
 * @phpstan-type PublicAssociationFilterBranchShape = array{
 *   associationCategory: string,
 *   associationTypeID: int,
 *   filterBranches: list<mixed>,
 *   filterBranchOperator: string,
 *   filterBranchType: FilterBranchType|value-of<FilterBranchType>,
 *   filters: list<FilterShape>,
 *   objectTypeID: string,
 *   operator: string,
 * }
 */
final class PublicAssociationFilterBranch implements BaseModel
{
    /** @use SdkModel<PublicAssociationFilterBranchShape> */
    use SdkModel;

    /**
     * Specifies the category of the association for the filter branch (HUBSPOT_DEFINED, USER_DEFINED, INTEGRATOR_DEFINED, WORK).
     */
    #[Required]
    public string $associationCategory;

    /**
     * Type id of the association.
     */
    #[Required('associationTypeId')]
    public int $associationTypeID;

    /** @var list<mixed> $filterBranches */
    #[Required(list: FilterBranch::class)]
    public array $filterBranches;

    /**
     * Filter branch operator (AND).
     */
    #[Required]
    public string $filterBranchOperator;

    /**
     * Type of the filter branch (ASSOCIATION).
     *
     * @var value-of<FilterBranchType> $filterBranchType
     */
    #[Required(enum: FilterBranchType::class)]
    public string $filterBranchType;

    /** @var list<FilterVariants> $filters */
    #[Required(list: Filter::class)]
    public array $filters;

    /**
     * The ID representing the type of object associated with the filter branch.
     */
    #[Required('objectTypeId')]
    public string $objectTypeID;

    /**
     * Defines the operation to be applied within the filter branch (IN_LIST, NOT_IN_LIST).
     */
    #[Required]
    public string $operator;

    /**
     * `new PublicAssociationFilterBranch()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicAssociationFilterBranch::with(
     *   associationCategory: ...,
     *   associationTypeID: ...,
     *   filterBranches: ...,
     *   filterBranchOperator: ...,
     *   filterBranchType: ...,
     *   filters: ...,
     *   objectTypeID: ...,
     *   operator: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicAssociationFilterBranch)
     *   ->withAssociationCategory(...)
     *   ->withAssociationTypeID(...)
     *   ->withFilterBranches(...)
     *   ->withFilterBranchOperator(...)
     *   ->withFilterBranchType(...)
     *   ->withFilters(...)
     *   ->withObjectTypeID(...)
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
     * @param FilterBranchType|value-of<FilterBranchType> $filterBranchType
     */
    public static function with(
        string $associationCategory,
        int $associationTypeID,
        array $filterBranches,
        string $filterBranchOperator,
        array $filters,
        string $objectTypeID,
        string $operator,
        FilterBranchType|string $filterBranchType = 'ASSOCIATION',
    ): self {
        $self = new self;

        $self['associationCategory'] = $associationCategory;
        $self['associationTypeID'] = $associationTypeID;
        $self['filterBranches'] = $filterBranches;
        $self['filterBranchOperator'] = $filterBranchOperator;
        $self['filterBranchType'] = $filterBranchType;
        $self['filters'] = $filters;
        $self['objectTypeID'] = $objectTypeID;
        $self['operator'] = $operator;

        return $self;
    }

    /**
     * Specifies the category of the association for the filter branch (HUBSPOT_DEFINED, USER_DEFINED, INTEGRATOR_DEFINED, WORK).
     */
    public function withAssociationCategory(string $associationCategory): self
    {
        $self = clone $this;
        $self['associationCategory'] = $associationCategory;

        return $self;
    }

    /**
     * Type id of the association.
     */
    public function withAssociationTypeID(int $associationTypeID): self
    {
        $self = clone $this;
        $self['associationTypeID'] = $associationTypeID;

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
     * Type of the filter branch (ASSOCIATION).
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

    /**
     * The ID representing the type of object associated with the filter branch.
     */
    public function withObjectTypeID(string $objectTypeID): self
    {
        $self = clone $this;
        $self['objectTypeID'] = $objectTypeID;

        return $self;
    }

    /**
     * Defines the operation to be applied within the filter branch (IN_LIST, NOT_IN_LIST).
     */
    public function withOperator(string $operator): self
    {
        $self = clone $this;
        $self['operator'] = $operator;

        return $self;
    }
}
