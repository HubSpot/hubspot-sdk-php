<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Events\EventDefinitions\BoolPropertyOperation\Operator;
use HubspotSDK\Events\EventDefinitions\BoolPropertyOperation\PropertyType;
use HubspotSDK\Events\EventDefinitions\CalendarDatePropertyOperation\FiscalYearStart;
use HubspotSDK\Events\EventDefinitions\CalendarDatePropertyOperation\TimeUnit;
use HubspotSDK\Events\EventDefinitions\DatePropertyOperation\Month;
use HubspotSDK\Events\EventDefinitions\PropertyFilter\FilterType;
use HubspotSDK\Events\EventDefinitions\RangedTimeOperation\LowerBoundEndpointBehavior;
use HubspotSDK\Events\EventDefinitions\RangedTimeOperation\UpperBoundEndpointBehavior;
use HubspotSDK\Events\EventDefinitions\TimePointOperation\EndpointBehavior;
use HubspotSDK\Events\EventDefinitions\TimePointOperation\PropertyParser;

/**
 * @phpstan-type PropertyFilterShape = array{
 *   filterType: value-of<FilterType>,
 *   operation: BoolPropertyOperation|NumberPropertyOperation|StringPropertyOperation|DateTimePropertyOperation|RangedDatePropertyOperation|ComparativeDatePropertyOperation|ComparativePropertyUpdatedOperation|RollingDateRangePropertyOperation|RollingPropertyUpdatedOperation|EnumerationPropertyOperation|AllPropertyTypesOperation|RangedNumberPropertyOperation|MultiStringPropertyOperation|DatePropertyOperation|CalendarDatePropertyOperation|TimePointOperation|RangedTimeOperation,
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
     * @param BoolPropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: string,
     *   operator: value-of<Operator>,
     *   operatorName: string,
     *   propertyType: value-of<PropertyType>,
     *   value: bool,
     *   defaultValue?: string|null,
     * }|NumberPropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: string,
     *   operator: value-of<NumberPropertyOperation\Operator>,
     *   operatorName: string,
     *   propertyType: value-of<NumberPropertyOperation\PropertyType>,
     *   value: float,
     *   defaultValue?: string|null,
     * }|StringPropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: string,
     *   operator: value-of<StringPropertyOperation\Operator>,
     *   operatorName: string,
     *   propertyType: value-of<StringPropertyOperation\PropertyType>,
     *   value: string,
     *   defaultValue?: string|null,
     * }|DateTimePropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: string,
     *   operator: value-of<DateTimePropertyOperation\Operator>,
     *   operatorName: string,
     *   propertyType: value-of<DateTimePropertyOperation\PropertyType>,
     *   requiresTimeZoneConversion: bool,
     *   timestamp: int,
     *   defaultValue?: string|null,
     * }|RangedDatePropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   lowerBoundTimestamp: int,
     *   operationType: string,
     *   operator: value-of<RangedDatePropertyOperation\Operator>,
     *   operatorName: string,
     *   propertyType: value-of<RangedDatePropertyOperation\PropertyType>,
     *   requiresTimeZoneConversion: bool,
     *   upperBoundTimestamp: int,
     *   defaultValue?: string|null,
     * }|ComparativeDatePropertyOperation|array{
     *   comparisonPropertyName: string,
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: string,
     *   operator: value-of<ComparativeDatePropertyOperation\Operator>,
     *   operatorName: string,
     *   propertyType: value-of<ComparativeDatePropertyOperation\PropertyType>,
     *   defaultComparisonValue?: string|null,
     *   defaultValue?: string|null,
     * }|ComparativePropertyUpdatedOperation|array{
     *   comparisonPropertyName: string,
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: string,
     *   operator: value-of<ComparativePropertyUpdatedOperation\Operator>,
     *   operatorName: string,
     *   propertyType: value-of<ComparativePropertyUpdatedOperation\PropertyType>,
     *   defaultComparisonValue?: string|null,
     *   defaultValue?: string|null,
     * }|RollingDateRangePropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   numberOfDays: int,
     *   operationType: string,
     *   operator: value-of<RollingDateRangePropertyOperation\Operator>,
     *   operatorName: string,
     *   propertyType: value-of<RollingDateRangePropertyOperation\PropertyType>,
     *   requiresTimeZoneConversion: bool,
     *   defaultValue?: string|null,
     * }|RollingPropertyUpdatedOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   numberOfDays: int,
     *   operationType: string,
     *   operator: value-of<RollingPropertyUpdatedOperation\Operator>,
     *   operatorName: string,
     *   propertyType: value-of<RollingPropertyUpdatedOperation\PropertyType>,
     *   defaultValue?: string|null,
     * }|EnumerationPropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: string,
     *   operator: value-of<EnumerationPropertyOperation\Operator>,
     *   operatorName: string,
     *   propertyType: value-of<EnumerationPropertyOperation\PropertyType>,
     *   values: list<string>,
     *   defaultValue?: string|null,
     * }|AllPropertyTypesOperation|array{
     *   coalescingRefineBy: NumOccurrencesRefineBy|SetOccurrencesRefineBy,
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: string,
     *   operator: value-of<AllPropertyTypesOperation\Operator>,
     *   operatorName: string,
     *   propertyType: value-of<AllPropertyTypesOperation\PropertyType>,
     *   defaultValue?: string|null,
     *   pruningRefineBy?: RelativeComparativeTimestampRefineBy|RelativeRangedTimestampRefineBy|AbsoluteComparativeTimestampRefineBy|AbsoluteRangedTimestampRefineBy|AllHistoryRefineBy|TimePointOperation|RangedTimeOperation|null,
     * }|RangedNumberPropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   lowerBound: int,
     *   operationType: string,
     *   operator: value-of<RangedNumberPropertyOperation\Operator>,
     *   operatorName: string,
     *   propertyType: value-of<RangedNumberPropertyOperation\PropertyType>,
     *   upperBound: int,
     *   defaultValue?: string|null,
     * }|MultiStringPropertyOperation|array{
     *   coalescingRefineBy: NumOccurrencesRefineBy|SetOccurrencesRefineBy,
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: string,
     *   operator: value-of<MultiStringPropertyOperation\Operator>,
     *   operatorName: string,
     *   propertyType: value-of<MultiStringPropertyOperation\PropertyType>,
     *   values: list<string>,
     *   defaultValue?: string|null,
     *   pruningRefineBy?: RelativeComparativeTimestampRefineBy|RelativeRangedTimestampRefineBy|AbsoluteComparativeTimestampRefineBy|AbsoluteRangedTimestampRefineBy|AllHistoryRefineBy|TimePointOperation|RangedTimeOperation|null,
     * }|DatePropertyOperation|array{
     *   day: int,
     *   includeObjectsWithNoValueSet: bool,
     *   month: value-of<Month>,
     *   operationType: string,
     *   operator: value-of<DatePropertyOperation\Operator>,
     *   operatorName: string,
     *   propertyType: value-of<DatePropertyOperation\PropertyType>,
     *   year: int,
     *   defaultValue?: string|null,
     * }|CalendarDatePropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: string,
     *   operator: value-of<CalendarDatePropertyOperation\Operator>,
     *   operatorName: string,
     *   propertyType: value-of<CalendarDatePropertyOperation\PropertyType>,
     *   timeUnit: value-of<TimeUnit>,
     *   timeUnitCount: int,
     *   useFiscalYear: bool,
     *   defaultValue?: string|null,
     *   fiscalYearStart?: value-of<FiscalYearStart>|null,
     * }|TimePointOperation|array{
     *   endpointBehavior: value-of<EndpointBehavior>,
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: string,
     *   operator: value-of<TimePointOperation\Operator>,
     *   operatorName: string,
     *   propertyParser: value-of<PropertyParser>,
     *   propertyType: value-of<TimePointOperation\PropertyType>,
     *   timePoint: DatePoint|IndexedTimePoint|PropertyReferencedTime,
     *   type: string,
     *   defaultValue?: string|null,
     * }|RangedTimeOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   lowerBoundEndpointBehavior: value-of<LowerBoundEndpointBehavior>,
     *   lowerBoundTimePoint: DatePoint|IndexedTimePoint|PropertyReferencedTime,
     *   operationType: string,
     *   operator: value-of<RangedTimeOperation\Operator>,
     *   operatorName: string,
     *   propertyParser: value-of<RangedTimeOperation\PropertyParser>,
     *   propertyType: value-of<RangedTimeOperation\PropertyType>,
     *   type: string,
     *   upperBoundEndpointBehavior: value-of<UpperBoundEndpointBehavior>,
     *   upperBoundTimePoint: DatePoint|IndexedTimePoint|PropertyReferencedTime,
     *   defaultValue?: string|null,
     * } $operation
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
     * @param BoolPropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: string,
     *   operator: value-of<Operator>,
     *   operatorName: string,
     *   propertyType: value-of<PropertyType>,
     *   value: bool,
     *   defaultValue?: string|null,
     * }|NumberPropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: string,
     *   operator: value-of<NumberPropertyOperation\Operator>,
     *   operatorName: string,
     *   propertyType: value-of<NumberPropertyOperation\PropertyType>,
     *   value: float,
     *   defaultValue?: string|null,
     * }|StringPropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: string,
     *   operator: value-of<StringPropertyOperation\Operator>,
     *   operatorName: string,
     *   propertyType: value-of<StringPropertyOperation\PropertyType>,
     *   value: string,
     *   defaultValue?: string|null,
     * }|DateTimePropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: string,
     *   operator: value-of<DateTimePropertyOperation\Operator>,
     *   operatorName: string,
     *   propertyType: value-of<DateTimePropertyOperation\PropertyType>,
     *   requiresTimeZoneConversion: bool,
     *   timestamp: int,
     *   defaultValue?: string|null,
     * }|RangedDatePropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   lowerBoundTimestamp: int,
     *   operationType: string,
     *   operator: value-of<RangedDatePropertyOperation\Operator>,
     *   operatorName: string,
     *   propertyType: value-of<RangedDatePropertyOperation\PropertyType>,
     *   requiresTimeZoneConversion: bool,
     *   upperBoundTimestamp: int,
     *   defaultValue?: string|null,
     * }|ComparativeDatePropertyOperation|array{
     *   comparisonPropertyName: string,
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: string,
     *   operator: value-of<ComparativeDatePropertyOperation\Operator>,
     *   operatorName: string,
     *   propertyType: value-of<ComparativeDatePropertyOperation\PropertyType>,
     *   defaultComparisonValue?: string|null,
     *   defaultValue?: string|null,
     * }|ComparativePropertyUpdatedOperation|array{
     *   comparisonPropertyName: string,
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: string,
     *   operator: value-of<ComparativePropertyUpdatedOperation\Operator>,
     *   operatorName: string,
     *   propertyType: value-of<ComparativePropertyUpdatedOperation\PropertyType>,
     *   defaultComparisonValue?: string|null,
     *   defaultValue?: string|null,
     * }|RollingDateRangePropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   numberOfDays: int,
     *   operationType: string,
     *   operator: value-of<RollingDateRangePropertyOperation\Operator>,
     *   operatorName: string,
     *   propertyType: value-of<RollingDateRangePropertyOperation\PropertyType>,
     *   requiresTimeZoneConversion: bool,
     *   defaultValue?: string|null,
     * }|RollingPropertyUpdatedOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   numberOfDays: int,
     *   operationType: string,
     *   operator: value-of<RollingPropertyUpdatedOperation\Operator>,
     *   operatorName: string,
     *   propertyType: value-of<RollingPropertyUpdatedOperation\PropertyType>,
     *   defaultValue?: string|null,
     * }|EnumerationPropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: string,
     *   operator: value-of<EnumerationPropertyOperation\Operator>,
     *   operatorName: string,
     *   propertyType: value-of<EnumerationPropertyOperation\PropertyType>,
     *   values: list<string>,
     *   defaultValue?: string|null,
     * }|AllPropertyTypesOperation|array{
     *   coalescingRefineBy: NumOccurrencesRefineBy|SetOccurrencesRefineBy,
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: string,
     *   operator: value-of<AllPropertyTypesOperation\Operator>,
     *   operatorName: string,
     *   propertyType: value-of<AllPropertyTypesOperation\PropertyType>,
     *   defaultValue?: string|null,
     *   pruningRefineBy?: RelativeComparativeTimestampRefineBy|RelativeRangedTimestampRefineBy|AbsoluteComparativeTimestampRefineBy|AbsoluteRangedTimestampRefineBy|AllHistoryRefineBy|TimePointOperation|RangedTimeOperation|null,
     * }|RangedNumberPropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   lowerBound: int,
     *   operationType: string,
     *   operator: value-of<RangedNumberPropertyOperation\Operator>,
     *   operatorName: string,
     *   propertyType: value-of<RangedNumberPropertyOperation\PropertyType>,
     *   upperBound: int,
     *   defaultValue?: string|null,
     * }|MultiStringPropertyOperation|array{
     *   coalescingRefineBy: NumOccurrencesRefineBy|SetOccurrencesRefineBy,
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: string,
     *   operator: value-of<MultiStringPropertyOperation\Operator>,
     *   operatorName: string,
     *   propertyType: value-of<MultiStringPropertyOperation\PropertyType>,
     *   values: list<string>,
     *   defaultValue?: string|null,
     *   pruningRefineBy?: RelativeComparativeTimestampRefineBy|RelativeRangedTimestampRefineBy|AbsoluteComparativeTimestampRefineBy|AbsoluteRangedTimestampRefineBy|AllHistoryRefineBy|TimePointOperation|RangedTimeOperation|null,
     * }|DatePropertyOperation|array{
     *   day: int,
     *   includeObjectsWithNoValueSet: bool,
     *   month: value-of<Month>,
     *   operationType: string,
     *   operator: value-of<DatePropertyOperation\Operator>,
     *   operatorName: string,
     *   propertyType: value-of<DatePropertyOperation\PropertyType>,
     *   year: int,
     *   defaultValue?: string|null,
     * }|CalendarDatePropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: string,
     *   operator: value-of<CalendarDatePropertyOperation\Operator>,
     *   operatorName: string,
     *   propertyType: value-of<CalendarDatePropertyOperation\PropertyType>,
     *   timeUnit: value-of<TimeUnit>,
     *   timeUnitCount: int,
     *   useFiscalYear: bool,
     *   defaultValue?: string|null,
     *   fiscalYearStart?: value-of<FiscalYearStart>|null,
     * }|TimePointOperation|array{
     *   endpointBehavior: value-of<EndpointBehavior>,
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: string,
     *   operator: value-of<TimePointOperation\Operator>,
     *   operatorName: string,
     *   propertyParser: value-of<PropertyParser>,
     *   propertyType: value-of<TimePointOperation\PropertyType>,
     *   timePoint: DatePoint|IndexedTimePoint|PropertyReferencedTime,
     *   type: string,
     *   defaultValue?: string|null,
     * }|RangedTimeOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   lowerBoundEndpointBehavior: value-of<LowerBoundEndpointBehavior>,
     *   lowerBoundTimePoint: DatePoint|IndexedTimePoint|PropertyReferencedTime,
     *   operationType: string,
     *   operator: value-of<RangedTimeOperation\Operator>,
     *   operatorName: string,
     *   propertyParser: value-of<RangedTimeOperation\PropertyParser>,
     *   propertyType: value-of<RangedTimeOperation\PropertyType>,
     *   type: string,
     *   upperBoundEndpointBehavior: value-of<UpperBoundEndpointBehavior>,
     *   upperBoundTimePoint: DatePoint|IndexedTimePoint|PropertyReferencedTime,
     *   defaultValue?: string|null,
     * } $operation
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
