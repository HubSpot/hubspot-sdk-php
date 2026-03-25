<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Lists\PublicPropertyAssociationFilterBranch\Filter;
use HubspotSDK\Crm\Lists\PublicPropertyAssociationFilterBranch\FilterBranch;
use HubspotSDK\Crm\Lists\PublicPropertyAssociationFilterBranch\FilterBranchType;

/**
 * @phpstan-import-type FilterVariants from \HubspotSDK\Crm\Lists\PublicPropertyAssociationFilterBranch\Filter
 * @phpstan-import-type FilterShape from \HubspotSDK\Crm\Lists\PublicPropertyAssociationFilterBranch\Filter
 *
 * @phpstan-type PublicPropertyAssociationFilterBranchShape = array{
 *   filterBranches: list<mixed>,
 *   filterBranchOperator: string,
 *   filterBranchType: FilterBranchType|value-of<FilterBranchType>,
 *   filters: list<FilterShape>,
 *   objectTypeID: string,
 *   operator: string,
 *   propertyWithObjectID: string,
 * }
 */
final class PublicPropertyAssociationFilterBranch implements BaseModel
{
    /** @use SdkModel<PublicPropertyAssociationFilterBranchShape> */
    use SdkModel;

    /** @var list<mixed> $filterBranches */
    #[Required(list: FilterBranch::class)]
    public array $filterBranches;

    /**
     * The logical operator used to combine filters within the branch.
     */
    #[Required]
    public string $filterBranchOperator;

    /**
     * The type of the filter branch (PROPERTY_ASSOCIATION).
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
     * The property that is associated with the object ID in the filter branch.
     */
    #[Required('propertyWithObjectId')]
    public string $propertyWithObjectID;

    /**
     * `new PublicPropertyAssociationFilterBranch()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicPropertyAssociationFilterBranch::with(
     *   filterBranches: ...,
     *   filterBranchOperator: ...,
     *   filterBranchType: ...,
     *   filters: ...,
     *   objectTypeID: ...,
     *   operator: ...,
     *   propertyWithObjectID: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicPropertyAssociationFilterBranch)
     *   ->withFilterBranches(...)
     *   ->withFilterBranchOperator(...)
     *   ->withFilterBranchType(...)
     *   ->withFilters(...)
     *   ->withObjectTypeID(...)
     *   ->withOperator(...)
     *   ->withPropertyWithObjectID(...)
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
        string $objectTypeID,
        string $operator,
        string $propertyWithObjectID,
        FilterBranchType|string $filterBranchType = 'PROPERTY_ASSOCIATION',
    ): self {
        $self = new self;

        $self['filterBranches'] = $filterBranches;
        $self['filterBranchOperator'] = $filterBranchOperator;
        $self['filterBranchType'] = $filterBranchType;
        $self['filters'] = $filters;
        $self['objectTypeID'] = $objectTypeID;
        $self['operator'] = $operator;
        $self['propertyWithObjectID'] = $propertyWithObjectID;

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
     * The logical operator used to combine filters within the branch.
     */
    public function withFilterBranchOperator(string $filterBranchOperator): self
    {
        $self = clone $this;
        $self['filterBranchOperator'] = $filterBranchOperator;

        return $self;
    }

    /**
     * The type of the filter branch (PROPERTY_ASSOCIATION).
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

    /**
     * The property that is associated with the object ID in the filter branch.
     */
    public function withPropertyWithObjectID(string $propertyWithObjectID): self
    {
        $self = clone $this;
        $self['propertyWithObjectID'] = $propertyWithObjectID;

        return $self;
    }
}
