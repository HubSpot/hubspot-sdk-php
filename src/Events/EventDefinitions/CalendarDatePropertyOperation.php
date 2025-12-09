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
        $self = new self;

        $self['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;
        $self['operationType'] = $operationType;
        $self['operator'] = $operator;
        $self['operatorName'] = $operatorName;
        $self['propertyType'] = $propertyType;
        $self['timeUnit'] = $timeUnit;
        $self['timeUnitCount'] = $timeUnitCount;
        $self['useFiscalYear'] = $useFiscalYear;

        null !== $defaultValue && $self['defaultValue'] = $defaultValue;
        null !== $fiscalYearStart && $self['fiscalYearStart'] = $fiscalYearStart;

        return $self;
    }

    public function withIncludeObjectsWithNoValueSet(
        bool $includeObjectsWithNoValueSet
    ): self {
        $self = clone $this;
        $self['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;

        return $self;
    }

    public function withOperationType(string $operationType): self
    {
        $self = clone $this;
        $self['operationType'] = $operationType;

        return $self;
    }

    /**
     * @param Operator|value-of<Operator> $operator
     */
    public function withOperator(Operator|string $operator): self
    {
        $self = clone $this;
        $self['operator'] = $operator;

        return $self;
    }

    public function withOperatorName(string $operatorName): self
    {
        $self = clone $this;
        $self['operatorName'] = $operatorName;

        return $self;
    }

    /**
     * @param PropertyType|value-of<PropertyType> $propertyType
     */
    public function withPropertyType(PropertyType|string $propertyType): self
    {
        $self = clone $this;
        $self['propertyType'] = $propertyType;

        return $self;
    }

    /**
     * @param TimeUnit|value-of<TimeUnit> $timeUnit
     */
    public function withTimeUnit(TimeUnit|string $timeUnit): self
    {
        $self = clone $this;
        $self['timeUnit'] = $timeUnit;

        return $self;
    }

    public function withTimeUnitCount(int $timeUnitCount): self
    {
        $self = clone $this;
        $self['timeUnitCount'] = $timeUnitCount;

        return $self;
    }

    public function withUseFiscalYear(bool $useFiscalYear): self
    {
        $self = clone $this;
        $self['useFiscalYear'] = $useFiscalYear;

        return $self;
    }

    public function withDefaultValue(string $defaultValue): self
    {
        $self = clone $this;
        $self['defaultValue'] = $defaultValue;

        return $self;
    }

    /**
     * @param FiscalYearStart|value-of<FiscalYearStart> $fiscalYearStart
     */
    public function withFiscalYearStart(
        FiscalYearStart|string $fiscalYearStart
    ): self {
        $self = clone $this;
        $self['fiscalYearStart'] = $fiscalYearStart;

        return $self;
    }
}
