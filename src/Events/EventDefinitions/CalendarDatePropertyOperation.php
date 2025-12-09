<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Events\EventDefinitions\CalendarDatePropertyOperation\FiscalYearStart;
use HubspotSDK\Events\EventDefinitions\CalendarDatePropertyOperation\Operator;
use HubspotSDK\Events\EventDefinitions\CalendarDatePropertyOperation\PropertyType;
use HubspotSDK\Events\EventDefinitions\CalendarDatePropertyOperation\TimeUnit;

/**
 * @phpstan-type CalendarDatePropertyOperationShape = array{
 *   includeObjectsWithNoValueSet: bool,
 *   operationType: string,
 *   operator: value-of<Operator>,
 *   operatorName: string,
 *   propertyType: value-of<PropertyType>,
 *   timeUnit: value-of<TimeUnit>,
 *   timeUnitCount: int,
 *   useFiscalYear: bool,
 *   defaultValue?: string|null,
 *   fiscalYearStart?: value-of<FiscalYearStart>|null,
 * }
 */
final class CalendarDatePropertyOperation implements BaseModel
{
    /** @use SdkModel<CalendarDatePropertyOperationShape> */
    use SdkModel;

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

    /** @var value-of<TimeUnit> $timeUnit */
    #[Required(enum: TimeUnit::class)]
    public string $timeUnit;

    #[Required]
    public int $timeUnitCount;

    #[Required]
    public bool $useFiscalYear;

    #[Optional]
    public ?string $defaultValue;

    /** @var value-of<FiscalYearStart>|null $fiscalYearStart */
    #[Optional(enum: FiscalYearStart::class)]
    public ?string $fiscalYearStart;

    /**
     * `new CalendarDatePropertyOperation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CalendarDatePropertyOperation::with(
     *   includeObjectsWithNoValueSet: ...,
     *   operationType: ...,
     *   operator: ...,
     *   operatorName: ...,
     *   propertyType: ...,
     *   timeUnit: ...,
     *   timeUnitCount: ...,
     *   useFiscalYear: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CalendarDatePropertyOperation)
     *   ->withIncludeObjectsWithNoValueSet(...)
     *   ->withOperationType(...)
     *   ->withOperator(...)
     *   ->withOperatorName(...)
     *   ->withPropertyType(...)
     *   ->withTimeUnit(...)
     *   ->withTimeUnitCount(...)
     *   ->withUseFiscalYear(...)
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
     * @param Operator|value-of<Operator> $operator
     * @param TimeUnit|value-of<TimeUnit> $timeUnit
     * @param PropertyType|value-of<PropertyType> $propertyType
     * @param FiscalYearStart|value-of<FiscalYearStart> $fiscalYearStart
     */
    public static function with(
        bool $includeObjectsWithNoValueSet,
        string $operationType,
        Operator|string $operator,
        string $operatorName,
        TimeUnit|string $timeUnit,
        int $timeUnitCount,
        bool $useFiscalYear,
        PropertyType|string $propertyType = 'calendar-date',
        ?string $defaultValue = null,
        FiscalYearStart|string|null $fiscalYearStart = null,
    ): self {
        $obj = new self;

        $obj['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;
        $obj['operationType'] = $operationType;
        $obj['operator'] = $operator;
        $obj['operatorName'] = $operatorName;
        $obj['propertyType'] = $propertyType;
        $obj['timeUnit'] = $timeUnit;
        $obj['timeUnitCount'] = $timeUnitCount;
        $obj['useFiscalYear'] = $useFiscalYear;

        null !== $defaultValue && $obj['defaultValue'] = $defaultValue;
        null !== $fiscalYearStart && $obj['fiscalYearStart'] = $fiscalYearStart;

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

    /**
     * @param TimeUnit|value-of<TimeUnit> $timeUnit
     */
    public function withTimeUnit(TimeUnit|string $timeUnit): self
    {
        $obj = clone $this;
        $obj['timeUnit'] = $timeUnit;

        return $obj;
    }

    public function withTimeUnitCount(int $timeUnitCount): self
    {
        $obj = clone $this;
        $obj['timeUnitCount'] = $timeUnitCount;

        return $obj;
    }

    public function withUseFiscalYear(bool $useFiscalYear): self
    {
        $obj = clone $this;
        $obj['useFiscalYear'] = $useFiscalYear;

        return $obj;
    }

    public function withDefaultValue(string $defaultValue): self
    {
        $obj = clone $this;
        $obj['defaultValue'] = $defaultValue;

        return $obj;
    }

    /**
     * @param FiscalYearStart|value-of<FiscalYearStart> $fiscalYearStart
     */
    public function withFiscalYearStart(
        FiscalYearStart|string $fiscalYearStart
    ): self {
        $obj = clone $this;
        $obj['fiscalYearStart'] = $fiscalYearStart;

        return $obj;
    }
}
