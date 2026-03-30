<?php

declare(strict_types=1);

namespace HubspotSDK\Events\Definitions;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Events\Definitions\PropertyFilter\FilterType;

/**
 * @phpstan-import-type OperationVariants from \HubspotSDK\Events\Definitions\PropertyFilter\Operation
 * @phpstan-import-type OperationShape from \HubspotSDK\Events\Definitions\PropertyFilter\Operation
 * @phpstan-import-type PropertyFilterContextShape from \HubspotSDK\Events\Definitions\PropertyFilterContext
 *
 * @phpstan-type PropertyFilterShape = array{
 *   filterType: FilterType|value-of<FilterType>,
 *   operation: OperationShape,
 *   property: string,
 *   context?: null|PropertyFilterContext|PropertyFilterContextShape,
 *   filterInsightsID?: int|null,
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

    /** @var OperationVariants $operation */
    #[Required]
    public BoolPropertyOperation|NumberPropertyOperation|StringPropertyOperation|DateTimePropertyOperation|RangedDatePropertyOperation|ComparativeDatePropertyOperation|ComparativeBoolPropertyOperation|ComparativeNumberPropertyOperation|ComparativeStringPropertyOperation|ComparativePropertyUpdatedOperation|RollingDateRangePropertyOperation|RollingPropertyUpdatedOperation|EnumerationPropertyOperation|AllPropertyTypesOperation|RangedNumberPropertyOperation|MultiStringPropertyOperation|DatePropertyOperation|CalendarDatePropertyOperation|TimePointOperation|RangedTimeOperation|RegexPropertyOperation $operation;

    #[Required]
    public string $property;

    #[Optional]
    public ?PropertyFilterContext $context;

    #[Optional('filterInsightsId')]
    public ?int $filterInsightsID;

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
     * @param PropertyFilterContext|PropertyFilterContextShape|null $context
     */
    public static function with(
        BoolPropertyOperation|array|NumberPropertyOperation|StringPropertyOperation|DateTimePropertyOperation|RangedDatePropertyOperation|ComparativeDatePropertyOperation|ComparativeBoolPropertyOperation|ComparativeNumberPropertyOperation|ComparativeStringPropertyOperation|ComparativePropertyUpdatedOperation|RollingDateRangePropertyOperation|RollingPropertyUpdatedOperation|EnumerationPropertyOperation|AllPropertyTypesOperation|RangedNumberPropertyOperation|MultiStringPropertyOperation|DatePropertyOperation|CalendarDatePropertyOperation|TimePointOperation|RangedTimeOperation|RegexPropertyOperation $operation,
        string $property,
        FilterType|string $filterType = 'PROPERTY',
        PropertyFilterContext|array|null $context = null,
        ?int $filterInsightsID = null,
        ?int $frameworkFilterID = null,
    ): self {
        $self = new self;

        $self['filterType'] = $filterType;
        $self['operation'] = $operation;
        $self['property'] = $property;

        null !== $context && $self['context'] = $context;
        null !== $filterInsightsID && $self['filterInsightsID'] = $filterInsightsID;
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
        BoolPropertyOperation|array|NumberPropertyOperation|StringPropertyOperation|DateTimePropertyOperation|RangedDatePropertyOperation|ComparativeDatePropertyOperation|ComparativeBoolPropertyOperation|ComparativeNumberPropertyOperation|ComparativeStringPropertyOperation|ComparativePropertyUpdatedOperation|RollingDateRangePropertyOperation|RollingPropertyUpdatedOperation|EnumerationPropertyOperation|AllPropertyTypesOperation|RangedNumberPropertyOperation|MultiStringPropertyOperation|DatePropertyOperation|CalendarDatePropertyOperation|TimePointOperation|RangedTimeOperation|RegexPropertyOperation $operation,
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

    /**
     * @param PropertyFilterContext|PropertyFilterContextShape $context
     */
    public function withContext(PropertyFilterContext|array $context): self
    {
        $self = clone $this;
        $self['context'] = $context;

        return $self;
    }

    public function withFilterInsightsID(int $filterInsightsID): self
    {
        $self = clone $this;
        $self['filterInsightsID'] = $filterInsightsID;

        return $self;
    }

    public function withFrameworkFilterID(int $frameworkFilterID): self
    {
        $self = clone $this;
        $self['frameworkFilterID'] = $frameworkFilterID;

        return $self;
    }
}
