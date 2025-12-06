<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicBoolPropertyOperation\OperationType;
use HubspotSDK\PublicCalendarDatePropertyOperation\FiscalYearStart;
use HubspotSDK\PublicRangedTimeOperation\Type;

/**
 * @phpstan-type PublicEventFilterMetadataShape = array{
 *   operation: PublicBoolPropertyOperation|PublicNumberPropertyOperation|PublicStringPropertyOperation|PublicDateTimePropertyOperation|PublicRangedDatePropertyOperation|PublicComparativePropertyUpdatedOperation|PublicComparativeDatePropertyOperation|PublicRollingDateRangePropertyOperation|PublicRollingPropertyUpdatedOperation|PublicEnumerationPropertyOperation|PublicAllPropertyTypesOperation|PublicRangedNumberPropertyOperation|PublicMultiStringPropertyOperation|PublicDatePropertyOperation|PublicCalendarDatePropertyOperation|PublicTimePointOperation|PublicRangedTimeOperation,
 *   property: string,
 * }
 */
final class PublicEventFilterMetadata implements BaseModel
{
    /** @use SdkModel<PublicEventFilterMetadataShape> */
    use SdkModel;

    #[Api]
    public PublicBoolPropertyOperation|PublicNumberPropertyOperation|PublicStringPropertyOperation|PublicDateTimePropertyOperation|PublicRangedDatePropertyOperation|PublicComparativePropertyUpdatedOperation|PublicComparativeDatePropertyOperation|PublicRollingDateRangePropertyOperation|PublicRollingPropertyUpdatedOperation|PublicEnumerationPropertyOperation|PublicAllPropertyTypesOperation|PublicRangedNumberPropertyOperation|PublicMultiStringPropertyOperation|PublicDatePropertyOperation|PublicCalendarDatePropertyOperation|PublicTimePointOperation|PublicRangedTimeOperation $operation;

    #[Api]
    public string $property;

    /**
     * `new PublicEventFilterMetadata()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicEventFilterMetadata::with(operation: ..., property: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicEventFilterMetadata)->withOperation(...)->withProperty(...)
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
     * @param PublicBoolPropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: value-of<OperationType>,
     *   operator: string,
     *   value: bool,
     * }|PublicNumberPropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: value-of<PublicNumberPropertyOperation\OperationType>,
     *   operator: string,
     *   value: float,
     * }|PublicStringPropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: value-of<PublicStringPropertyOperation\OperationType>,
     *   operator: string,
     *   value: string,
     * }|PublicDateTimePropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: value-of<PublicDateTimePropertyOperation\OperationType>,
     *   operator: string,
     *   requiresTimeZoneConversion: bool,
     *   timestamp: int,
     * }|PublicRangedDatePropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   lowerBound: int,
     *   operationType: value-of<PublicRangedDatePropertyOperation\OperationType>,
     *   operator: string,
     *   requiresTimeZoneConversion: bool,
     *   upperBound: int,
     * }|PublicComparativePropertyUpdatedOperation|array{
     *   comparisonPropertyName: string,
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: value-of<PublicComparativePropertyUpdatedOperation\OperationType>,
     *   operator: string,
     *   defaultComparisonValue?: string|null,
     * }|PublicComparativeDatePropertyOperation|array{
     *   comparisonPropertyName: string,
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: value-of<PublicComparativeDatePropertyOperation\OperationType>,
     *   operator: string,
     *   defaultComparisonValue?: string|null,
     * }|PublicRollingDateRangePropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   numberOfDays: int,
     *   operationType: value-of<PublicRollingDateRangePropertyOperation\OperationType>,
     *   operator: string,
     *   requiresTimeZoneConversion: bool,
     * }|PublicRollingPropertyUpdatedOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   numberOfDays: int,
     *   operationType: value-of<PublicRollingPropertyUpdatedOperation\OperationType>,
     *   operator: string,
     * }|PublicEnumerationPropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: value-of<PublicEnumerationPropertyOperation\OperationType>,
     *   operator: string,
     *   values: list<string>,
     * }|PublicAllPropertyTypesOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: value-of<PublicAllPropertyTypesOperation\OperationType>,
     *   operator: string,
     * }|PublicRangedNumberPropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   lowerBound: int,
     *   operationType: value-of<PublicRangedNumberPropertyOperation\OperationType>,
     *   operator: string,
     *   upperBound: int,
     * }|PublicMultiStringPropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: value-of<PublicMultiStringPropertyOperation\OperationType>,
     *   operator: string,
     *   values: list<string>,
     * }|PublicDatePropertyOperation|array{
     *   day: int,
     *   includeObjectsWithNoValueSet: bool,
     *   month: string,
     *   operationType: value-of<PublicDatePropertyOperation\OperationType>,
     *   operator: string,
     *   year: int,
     * }|PublicCalendarDatePropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: value-of<PublicCalendarDatePropertyOperation\OperationType>,
     *   operator: string,
     *   timeUnit: string,
     *   fiscalYearStart?: value-of<FiscalYearStart>|null,
     *   timeUnitCount?: int|null,
     *   useFiscalYear?: bool|null,
     * }|PublicTimePointOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: value-of<PublicTimePointOperation\OperationType>,
     *   operator: string,
     *   timePoint: PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime,
     *   type: string,
     *   endpointBehavior?: string|null,
     *   propertyParser?: string|null,
     * }|PublicRangedTimeOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   lowerBoundTimePoint: PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime,
     *   operationType: string,
     *   operator: string,
     *   type: value-of<Type>,
     *   upperBoundTimePoint: PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime,
     *   lowerBoundEndpointBehavior?: string|null,
     *   propertyParser?: string|null,
     *   upperBoundEndpointBehavior?: string|null,
     * } $operation
     */
    public static function with(
        PublicBoolPropertyOperation|array|PublicNumberPropertyOperation|PublicStringPropertyOperation|PublicDateTimePropertyOperation|PublicRangedDatePropertyOperation|PublicComparativePropertyUpdatedOperation|PublicComparativeDatePropertyOperation|PublicRollingDateRangePropertyOperation|PublicRollingPropertyUpdatedOperation|PublicEnumerationPropertyOperation|PublicAllPropertyTypesOperation|PublicRangedNumberPropertyOperation|PublicMultiStringPropertyOperation|PublicDatePropertyOperation|PublicCalendarDatePropertyOperation|PublicTimePointOperation|PublicRangedTimeOperation $operation,
        string $property,
    ): self {
        $obj = new self;

        $obj['operation'] = $operation;
        $obj['property'] = $property;

        return $obj;
    }

    /**
     * @param PublicBoolPropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: value-of<OperationType>,
     *   operator: string,
     *   value: bool,
     * }|PublicNumberPropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: value-of<PublicNumberPropertyOperation\OperationType>,
     *   operator: string,
     *   value: float,
     * }|PublicStringPropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: value-of<PublicStringPropertyOperation\OperationType>,
     *   operator: string,
     *   value: string,
     * }|PublicDateTimePropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: value-of<PublicDateTimePropertyOperation\OperationType>,
     *   operator: string,
     *   requiresTimeZoneConversion: bool,
     *   timestamp: int,
     * }|PublicRangedDatePropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   lowerBound: int,
     *   operationType: value-of<PublicRangedDatePropertyOperation\OperationType>,
     *   operator: string,
     *   requiresTimeZoneConversion: bool,
     *   upperBound: int,
     * }|PublicComparativePropertyUpdatedOperation|array{
     *   comparisonPropertyName: string,
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: value-of<PublicComparativePropertyUpdatedOperation\OperationType>,
     *   operator: string,
     *   defaultComparisonValue?: string|null,
     * }|PublicComparativeDatePropertyOperation|array{
     *   comparisonPropertyName: string,
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: value-of<PublicComparativeDatePropertyOperation\OperationType>,
     *   operator: string,
     *   defaultComparisonValue?: string|null,
     * }|PublicRollingDateRangePropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   numberOfDays: int,
     *   operationType: value-of<PublicRollingDateRangePropertyOperation\OperationType>,
     *   operator: string,
     *   requiresTimeZoneConversion: bool,
     * }|PublicRollingPropertyUpdatedOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   numberOfDays: int,
     *   operationType: value-of<PublicRollingPropertyUpdatedOperation\OperationType>,
     *   operator: string,
     * }|PublicEnumerationPropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: value-of<PublicEnumerationPropertyOperation\OperationType>,
     *   operator: string,
     *   values: list<string>,
     * }|PublicAllPropertyTypesOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: value-of<PublicAllPropertyTypesOperation\OperationType>,
     *   operator: string,
     * }|PublicRangedNumberPropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   lowerBound: int,
     *   operationType: value-of<PublicRangedNumberPropertyOperation\OperationType>,
     *   operator: string,
     *   upperBound: int,
     * }|PublicMultiStringPropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: value-of<PublicMultiStringPropertyOperation\OperationType>,
     *   operator: string,
     *   values: list<string>,
     * }|PublicDatePropertyOperation|array{
     *   day: int,
     *   includeObjectsWithNoValueSet: bool,
     *   month: string,
     *   operationType: value-of<PublicDatePropertyOperation\OperationType>,
     *   operator: string,
     *   year: int,
     * }|PublicCalendarDatePropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: value-of<PublicCalendarDatePropertyOperation\OperationType>,
     *   operator: string,
     *   timeUnit: string,
     *   fiscalYearStart?: value-of<FiscalYearStart>|null,
     *   timeUnitCount?: int|null,
     *   useFiscalYear?: bool|null,
     * }|PublicTimePointOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: value-of<PublicTimePointOperation\OperationType>,
     *   operator: string,
     *   timePoint: PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime,
     *   type: string,
     *   endpointBehavior?: string|null,
     *   propertyParser?: string|null,
     * }|PublicRangedTimeOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   lowerBoundTimePoint: PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime,
     *   operationType: string,
     *   operator: string,
     *   type: value-of<Type>,
     *   upperBoundTimePoint: PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime,
     *   lowerBoundEndpointBehavior?: string|null,
     *   propertyParser?: string|null,
     *   upperBoundEndpointBehavior?: string|null,
     * } $operation
     */
    public function withOperation(
        PublicBoolPropertyOperation|array|PublicNumberPropertyOperation|PublicStringPropertyOperation|PublicDateTimePropertyOperation|PublicRangedDatePropertyOperation|PublicComparativePropertyUpdatedOperation|PublicComparativeDatePropertyOperation|PublicRollingDateRangePropertyOperation|PublicRollingPropertyUpdatedOperation|PublicEnumerationPropertyOperation|PublicAllPropertyTypesOperation|PublicRangedNumberPropertyOperation|PublicMultiStringPropertyOperation|PublicDatePropertyOperation|PublicCalendarDatePropertyOperation|PublicTimePointOperation|PublicRangedTimeOperation $operation,
    ): self {
        $obj = clone $this;
        $obj['operation'] = $operation;

        return $obj;
    }

    public function withProperty(string $property): self
    {
        $obj = clone $this;
        $obj['property'] = $property;

        return $obj;
    }
}
