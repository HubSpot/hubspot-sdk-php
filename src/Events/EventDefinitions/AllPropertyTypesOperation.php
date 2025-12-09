<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Events\EventDefinitions\AllPropertyTypesOperation\Operator;
use HubspotSDK\Events\EventDefinitions\AllPropertyTypesOperation\PropertyType;
use HubspotSDK\Events\EventDefinitions\NumOccurrencesRefineBy\Type;
use HubspotSDK\Events\EventDefinitions\RangedTimeOperation\LowerBoundEndpointBehavior;
use HubspotSDK\Events\EventDefinitions\RangedTimeOperation\UpperBoundEndpointBehavior;
use HubspotSDK\Events\EventDefinitions\RelativeComparativeTimestampRefineBy\Comparison;
use HubspotSDK\Events\EventDefinitions\RelativeRangedTimestampRefineBy\RangeType;
use HubspotSDK\Events\EventDefinitions\SetOccurrencesRefineBy\SetType;
use HubspotSDK\Events\EventDefinitions\TimePointOperation\EndpointBehavior;
use HubspotSDK\Events\EventDefinitions\TimePointOperation\PropertyParser;

/**
 * @phpstan-type AllPropertyTypesOperationShape = array{
 *   coalescingRefineBy: NumOccurrencesRefineBy|SetOccurrencesRefineBy,
 *   includeObjectsWithNoValueSet: bool,
 *   operationType: string,
 *   operator: value-of<Operator>,
 *   operatorName: string,
 *   propertyType: value-of<PropertyType>,
 *   defaultValue?: string|null,
 *   pruningRefineBy?: null|RelativeComparativeTimestampRefineBy|RelativeRangedTimestampRefineBy|AbsoluteComparativeTimestampRefineBy|AbsoluteRangedTimestampRefineBy|AllHistoryRefineBy|TimePointOperation|RangedTimeOperation,
 * }
 */
final class AllPropertyTypesOperation implements BaseModel
{
    /** @use SdkModel<AllPropertyTypesOperationShape> */
    use SdkModel;

    #[Required]
    public NumOccurrencesRefineBy|SetOccurrencesRefineBy $coalescingRefineBy;

    #[Required]
    public bool $includeObjectsWithNoValueSet;

    #[Required]
    public string $operationType;

    /** @var value-of<Operator> $operator */
    #[Required(enum: Operator::class)]
    public string $operator;

    #[Required]
    public string $operatorName;

    /** @var value-of<PropertyType> $propertyType */
    #[Required(enum: PropertyType::class)]
    public string $propertyType;

    #[Optional]
    public ?string $defaultValue;

    #[Optional]
    public RelativeComparativeTimestampRefineBy|RelativeRangedTimestampRefineBy|AbsoluteComparativeTimestampRefineBy|AbsoluteRangedTimestampRefineBy|AllHistoryRefineBy|TimePointOperation|RangedTimeOperation|null $pruningRefineBy;

    /**
     * `new AllPropertyTypesOperation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AllPropertyTypesOperation::with(
     *   coalescingRefineBy: ...,
     *   includeObjectsWithNoValueSet: ...,
     *   operationType: ...,
     *   operator: ...,
     *   operatorName: ...,
     *   propertyType: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AllPropertyTypesOperation)
     *   ->withCoalescingRefineBy(...)
     *   ->withIncludeObjectsWithNoValueSet(...)
     *   ->withOperationType(...)
     *   ->withOperator(...)
     *   ->withOperatorName(...)
     *   ->withPropertyType(...)
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
     * @param NumOccurrencesRefineBy|array{
     *   type: value-of<Type>, maxOccurrences?: int|null, minOccurrences?: int|null
     * }|SetOccurrencesRefineBy|array{
     *   setType: value-of<SetType>,
     *   type: value-of<SetOccurrencesRefineBy\Type>,
     * } $coalescingRefineBy
     * @param Operator|value-of<Operator> $operator
     * @param PropertyType|value-of<PropertyType> $propertyType
     * @param RelativeComparativeTimestampRefineBy|array{
     *   comparison: value-of<Comparison>,
     *   timeOffset: TimeOffset,
     *   type: value-of<RelativeComparativeTimestampRefineBy\Type>,
     * }|RelativeRangedTimestampRefineBy|array{
     *   lowerBoundOffset: TimeOffset,
     *   rangeType: value-of<RangeType>,
     *   type: value-of<RelativeRangedTimestampRefineBy\Type>,
     *   upperBoundOffset: TimeOffset,
     * }|AbsoluteComparativeTimestampRefineBy|array{
     *   comparison: value-of<AbsoluteComparativeTimestampRefineBy\Comparison>,
     *   timestamp: int,
     *   type: value-of<AbsoluteComparativeTimestampRefineBy\Type>,
     * }|AbsoluteRangedTimestampRefineBy|array{
     *   lowerTimestamp: int,
     *   rangeType: value-of<AbsoluteRangedTimestampRefineBy\RangeType>,
     *   type: value-of<AbsoluteRangedTimestampRefineBy\Type>,
     *   upperTimestamp: int,
     * }|AllHistoryRefineBy|array{
     *   type: value-of<AllHistoryRefineBy\Type>
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
     * } $pruningRefineBy
     */
    public static function with(
        NumOccurrencesRefineBy|array|SetOccurrencesRefineBy $coalescingRefineBy,
        bool $includeObjectsWithNoValueSet,
        string $operationType,
        Operator|string $operator,
        string $operatorName,
        PropertyType|string $propertyType = 'alltypes',
        ?string $defaultValue = null,
        RelativeComparativeTimestampRefineBy|array|RelativeRangedTimestampRefineBy|AbsoluteComparativeTimestampRefineBy|AbsoluteRangedTimestampRefineBy|AllHistoryRefineBy|TimePointOperation|RangedTimeOperation|null $pruningRefineBy = null,
    ): self {
        $obj = new self;

        $obj['coalescingRefineBy'] = $coalescingRefineBy;
        $obj['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;
        $obj['operationType'] = $operationType;
        $obj['operator'] = $operator;
        $obj['operatorName'] = $operatorName;
        $obj['propertyType'] = $propertyType;

        null !== $defaultValue && $obj['defaultValue'] = $defaultValue;
        null !== $pruningRefineBy && $obj['pruningRefineBy'] = $pruningRefineBy;

        return $obj;
    }

    /**
     * @param NumOccurrencesRefineBy|array{
     *   type: value-of<Type>, maxOccurrences?: int|null, minOccurrences?: int|null
     * }|SetOccurrencesRefineBy|array{
     *   setType: value-of<SetType>,
     *   type: value-of<SetOccurrencesRefineBy\Type>,
     * } $coalescingRefineBy
     */
    public function withCoalescingRefineBy(
        NumOccurrencesRefineBy|array|SetOccurrencesRefineBy $coalescingRefineBy
    ): self {
        $obj = clone $this;
        $obj['coalescingRefineBy'] = $coalescingRefineBy;

        return $obj;
    }

    public function withIncludeObjectsWithNoValueSet(
        bool $includeObjectsWithNoValueSet
    ): self {
        $obj = clone $this;
        $obj['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;

        return $obj;
    }

    public function withOperationType(string $operationType): self
    {
        $obj = clone $this;
        $obj['operationType'] = $operationType;

        return $obj;
    }

    /**
     * @param Operator|value-of<Operator> $operator
     */
    public function withOperator(Operator|string $operator): self
    {
        $obj = clone $this;
        $obj['operator'] = $operator;

        return $obj;
    }

    public function withOperatorName(string $operatorName): self
    {
        $obj = clone $this;
        $obj['operatorName'] = $operatorName;

        return $obj;
    }

    /**
     * @param PropertyType|value-of<PropertyType> $propertyType
     */
    public function withPropertyType(PropertyType|string $propertyType): self
    {
        $obj = clone $this;
        $obj['propertyType'] = $propertyType;

        return $obj;
    }

    public function withDefaultValue(string $defaultValue): self
    {
        $obj = clone $this;
        $obj['defaultValue'] = $defaultValue;

        return $obj;
    }

    /**
     * @param RelativeComparativeTimestampRefineBy|array{
     *   comparison: value-of<Comparison>,
     *   timeOffset: TimeOffset,
     *   type: value-of<RelativeComparativeTimestampRefineBy\Type>,
     * }|RelativeRangedTimestampRefineBy|array{
     *   lowerBoundOffset: TimeOffset,
     *   rangeType: value-of<RangeType>,
     *   type: value-of<RelativeRangedTimestampRefineBy\Type>,
     *   upperBoundOffset: TimeOffset,
     * }|AbsoluteComparativeTimestampRefineBy|array{
     *   comparison: value-of<AbsoluteComparativeTimestampRefineBy\Comparison>,
     *   timestamp: int,
     *   type: value-of<AbsoluteComparativeTimestampRefineBy\Type>,
     * }|AbsoluteRangedTimestampRefineBy|array{
     *   lowerTimestamp: int,
     *   rangeType: value-of<AbsoluteRangedTimestampRefineBy\RangeType>,
     *   type: value-of<AbsoluteRangedTimestampRefineBy\Type>,
     *   upperTimestamp: int,
     * }|AllHistoryRefineBy|array{
     *   type: value-of<AllHistoryRefineBy\Type>
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
     * } $pruningRefineBy
     */
    public function withPruningRefineBy(
        RelativeComparativeTimestampRefineBy|array|RelativeRangedTimestampRefineBy|AbsoluteComparativeTimestampRefineBy|AbsoluteRangedTimestampRefineBy|AllHistoryRefineBy|TimePointOperation|RangedTimeOperation $pruningRefineBy,
    ): self {
        $obj = clone $this;
        $obj['pruningRefineBy'] = $pruningRefineBy;

        return $obj;
    }
}
