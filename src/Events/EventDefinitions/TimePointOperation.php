<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Events\EventDefinitions\DatePoint\TimeType;
use HubspotSDK\Events\EventDefinitions\DatePoint\TimezoneSource;
use HubspotSDK\Events\EventDefinitions\PropertyReferencedTime\ReferenceType;
use HubspotSDK\Events\EventDefinitions\TimePointOperation\EndpointBehavior;
use HubspotSDK\Events\EventDefinitions\TimePointOperation\Operator;
use HubspotSDK\Events\EventDefinitions\TimePointOperation\PropertyParser;
use HubspotSDK\Events\EventDefinitions\TimePointOperation\PropertyType;

/**
 * @phpstan-type TimePointOperationShape = array{
 *   endpointBehavior: value-of<EndpointBehavior>,
 *   includeObjectsWithNoValueSet: bool,
 *   operationType: string,
 *   operator: value-of<Operator>,
 *   operatorName: string,
 *   propertyParser: value-of<PropertyParser>,
 *   propertyType: value-of<PropertyType>,
 *   timePoint: DatePoint|IndexedTimePoint|PropertyReferencedTime,
 *   type: string,
 *   defaultValue?: string|null,
 * }
 */
final class TimePointOperation implements BaseModel
{
    /** @use SdkModel<TimePointOperationShape> */
    use SdkModel;

    /** @var value-of<EndpointBehavior> $endpointBehavior */
    #[Required(enum: EndpointBehavior::class)]
    public string $endpointBehavior;

    #[Required]
    public bool $includeObjectsWithNoValueSet;

    #[Required]
    public string $operationType;

    /** @var value-of<Operator> $operator */
    #[Required(enum: Operator::class)]
    public string $operator;

    #[Required]
    public string $operatorName;

    /** @var value-of<PropertyParser> $propertyParser */
    #[Required(enum: PropertyParser::class)]
    public string $propertyParser;

    /** @var value-of<PropertyType> $propertyType */
    #[Required(enum: PropertyType::class)]
    public string $propertyType;

    #[Required]
    public DatePoint|IndexedTimePoint|PropertyReferencedTime $timePoint;

    #[Required]
    public string $type;

    #[Optional]
    public ?string $defaultValue;

    /**
     * `new TimePointOperation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TimePointOperation::with(
     *   endpointBehavior: ...,
     *   includeObjectsWithNoValueSet: ...,
     *   operationType: ...,
     *   operator: ...,
     *   operatorName: ...,
     *   propertyParser: ...,
     *   propertyType: ...,
     *   timePoint: ...,
     *   type: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TimePointOperation)
     *   ->withEndpointBehavior(...)
     *   ->withIncludeObjectsWithNoValueSet(...)
     *   ->withOperationType(...)
     *   ->withOperator(...)
     *   ->withOperatorName(...)
     *   ->withPropertyParser(...)
     *   ->withPropertyType(...)
     *   ->withTimePoint(...)
     *   ->withType(...)
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
     * @param EndpointBehavior|value-of<EndpointBehavior> $endpointBehavior
     * @param Operator|value-of<Operator> $operator
     * @param PropertyParser|value-of<PropertyParser> $propertyParser
     * @param DatePoint|array{
     *   day: int,
     *   month: int,
     *   timeType: value-of<TimeType>,
     *   timezoneSource: value-of<TimezoneSource>,
     *   year: int,
     *   zoneID: string,
     *   hour?: int|null,
     *   millisecond?: int|null,
     *   minute?: int|null,
     *   second?: int|null,
     * }|IndexedTimePoint|array{
     *   indexReference: NowReference|TodayReference|WeekReference|MonthReference|QuarterReference|FiscalQuarter|YearReference|FiscalYear,
     *   timeType: value-of<IndexedTimePoint\TimeType>,
     *   timezoneSource: value-of<IndexedTimePoint\TimezoneSource>,
     *   zoneID: string,
     *   offset?: IndexOffset|null,
     * }|PropertyReferencedTime|array{
     *   property: string,
     *   referenceType: value-of<ReferenceType>,
     *   timeType: value-of<PropertyReferencedTime\TimeType>,
     *   timezoneSource: value-of<PropertyReferencedTime\TimezoneSource>,
     *   zoneID: string,
     * } $timePoint
     * @param PropertyType|value-of<PropertyType> $propertyType
     */
    public static function with(
        EndpointBehavior|string $endpointBehavior,
        bool $includeObjectsWithNoValueSet,
        string $operationType,
        Operator|string $operator,
        string $operatorName,
        PropertyParser|string $propertyParser,
        DatePoint|array|IndexedTimePoint|PropertyReferencedTime $timePoint,
        string $type,
        PropertyType|string $propertyType = 'timepoint',
        ?string $defaultValue = null,
    ): self {
        $obj = new self;

        $obj['endpointBehavior'] = $endpointBehavior;
        $obj['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;
        $obj['operationType'] = $operationType;
        $obj['operator'] = $operator;
        $obj['operatorName'] = $operatorName;
        $obj['propertyParser'] = $propertyParser;
        $obj['propertyType'] = $propertyType;
        $obj['timePoint'] = $timePoint;
        $obj['type'] = $type;

        null !== $defaultValue && $obj['defaultValue'] = $defaultValue;

        return $obj;
    }

    /**
     * @param EndpointBehavior|value-of<EndpointBehavior> $endpointBehavior
     */
    public function withEndpointBehavior(
        EndpointBehavior|string $endpointBehavior
    ): self {
        $obj = clone $this;
        $obj['endpointBehavior'] = $endpointBehavior;

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
     * @param PropertyParser|value-of<PropertyParser> $propertyParser
     */
    public function withPropertyParser(
        PropertyParser|string $propertyParser
    ): self {
        $obj = clone $this;
        $obj['propertyParser'] = $propertyParser;

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

    /**
     * @param DatePoint|array{
     *   day: int,
     *   month: int,
     *   timeType: value-of<TimeType>,
     *   timezoneSource: value-of<TimezoneSource>,
     *   year: int,
     *   zoneID: string,
     *   hour?: int|null,
     *   millisecond?: int|null,
     *   minute?: int|null,
     *   second?: int|null,
     * }|IndexedTimePoint|array{
     *   indexReference: NowReference|TodayReference|WeekReference|MonthReference|QuarterReference|FiscalQuarter|YearReference|FiscalYear,
     *   timeType: value-of<IndexedTimePoint\TimeType>,
     *   timezoneSource: value-of<IndexedTimePoint\TimezoneSource>,
     *   zoneID: string,
     *   offset?: IndexOffset|null,
     * }|PropertyReferencedTime|array{
     *   property: string,
     *   referenceType: value-of<ReferenceType>,
     *   timeType: value-of<PropertyReferencedTime\TimeType>,
     *   timezoneSource: value-of<PropertyReferencedTime\TimezoneSource>,
     *   zoneID: string,
     * } $timePoint
     */
    public function withTimePoint(
        DatePoint|array|IndexedTimePoint|PropertyReferencedTime $timePoint
    ): self {
        $obj = clone $this;
        $obj['timePoint'] = $timePoint;

        return $obj;
    }

    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    public function withDefaultValue(string $defaultValue): self
    {
        $obj = clone $this;
        $obj['defaultValue'] = $defaultValue;

        return $obj;
    }
}
