<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Events\EventDefinitions\PropertyFilter\FilterType;

/**
 * @phpstan-import-type OperationShape from \HubspotSDK\Events\EventDefinitions\PropertyFilter\Operation
 *
 * @phpstan-type PropertyFilterShape = array{
 *   filterType: FilterType|value-of<FilterType>,
 *   operation: BoolPropertyOperation|NumberPropertyOperation|StringPropertyOperation|DateTimePropertyOperation|RangedDatePropertyOperation|ComparativeDatePropertyOperation|ComparativePropertyUpdatedOperation|RollingDateRangePropertyOperation|RollingPropertyUpdatedOperation|EnumerationPropertyOperation|AllPropertyTypesOperation|RangedNumberPropertyOperation|MultiStringPropertyOperation|DatePropertyOperation|CalendarDatePropertyOperation|TimePointOperation|RangedTimeOperation|OperationShape,
 *   property: string,
 *   frameworkFilterID?: int|null,
 * }
 */
final class PropertyFilter implements BaseModel
{
    /** @use SdkModel<PropertyFilterShape> */
    use SdkModel;

    /** @var value-of<FilterType> $filterType */
    #[Required(enum: FilterType::class)]
    public string $filterType;

    #[Required]
    public BoolPropertyOperation|NumberPropertyOperation|StringPropertyOperation|DateTimePropertyOperation|RangedDatePropertyOperation|ComparativeDatePropertyOperation|ComparativePropertyUpdatedOperation|RollingDateRangePropertyOperation|RollingPropertyUpdatedOperation|EnumerationPropertyOperation|AllPropertyTypesOperation|RangedNumberPropertyOperation|MultiStringPropertyOperation|DatePropertyOperation|CalendarDatePropertyOperation|TimePointOperation|RangedTimeOperation $operation;

    #[Required]
    public string $property;

    #[Optional('frameworkFilterId')]
    public ?int $frameworkFilterID;

    /**
     * `new PropertyFilter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PropertyFilter::with(filterType: ..., operation: ..., property: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PropertyFilter)->withFilterType(...)->withOperation(...)->withProperty(...)
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
     * @param OperationShape $operation
     * @param FilterType|value-of<FilterType> $filterType
     */
    public static function with(
        BoolPropertyOperation|array|NumberPropertyOperation|StringPropertyOperation|DateTimePropertyOperation|RangedDatePropertyOperation|ComparativeDatePropertyOperation|ComparativePropertyUpdatedOperation|RollingDateRangePropertyOperation|RollingPropertyUpdatedOperation|EnumerationPropertyOperation|AllPropertyTypesOperation|RangedNumberPropertyOperation|MultiStringPropertyOperation|DatePropertyOperation|CalendarDatePropertyOperation|TimePointOperation|RangedTimeOperation $operation,
        string $property,
        FilterType|string $filterType = 'PROPERTY',
        ?int $frameworkFilterID = null,
    ): self {
        $self = new self;

        $self['filterType'] = $filterType;
        $self['operation'] = $operation;
        $self['property'] = $property;

        null !== $frameworkFilterID && $self['frameworkFilterID'] = $frameworkFilterID;

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

    /**
     * @param OperationShape $operation
     */
    public function withOperation(
        BoolPropertyOperation|array|NumberPropertyOperation|StringPropertyOperation|DateTimePropertyOperation|RangedDatePropertyOperation|ComparativeDatePropertyOperation|ComparativePropertyUpdatedOperation|RollingDateRangePropertyOperation|RollingPropertyUpdatedOperation|EnumerationPropertyOperation|AllPropertyTypesOperation|RangedNumberPropertyOperation|MultiStringPropertyOperation|DatePropertyOperation|CalendarDatePropertyOperation|TimePointOperation|RangedTimeOperation $operation,
    ): self {
        $self = clone $this;
        $self['operation'] = $operation;

        return $self;
    }

    public function withProperty(string $property): self
    {
        $self = clone $this;
        $self['property'] = $property;

        return $self;
    }

    public function withFrameworkFilterID(int $frameworkFilterID): self
    {
        $self = clone $this;
        $self['frameworkFilterID'] = $frameworkFilterID;

        return $self;
    }
}
