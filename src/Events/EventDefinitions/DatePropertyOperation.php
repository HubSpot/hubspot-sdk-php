<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Events\EventDefinitions\DatePropertyOperation\Month;
use HubspotSDK\Events\EventDefinitions\DatePropertyOperation\Operator;
use HubspotSDK\Events\EventDefinitions\DatePropertyOperation\PropertyType;

/**
 * @phpstan-type DatePropertyOperationShape = array{
 *   day: int,
 *   includeObjectsWithNoValueSet: bool,
 *   month: Month|value-of<Month>,
 *   operationType: string,
 *   operator: Operator|value-of<Operator>,
 *   operatorName: string,
 *   propertyType: PropertyType|value-of<PropertyType>,
 *   year: int,
 *   defaultValue?: string|null,
 * }
 */
final class DatePropertyOperation implements BaseModel
{
    /** @use SdkModel<DatePropertyOperationShape> */
    use SdkModel;

    #[Required]
    public int $day;

    #[Required]
    public bool $includeObjectsWithNoValueSet;

    /** @var value-of<Month> $month */
    #[Required(enum: Month::class)]
    public string $month;

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

    #[Required]
    public int $year;

    #[Optional]
    public ?string $defaultValue;

    /**
     * `new DatePropertyOperation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DatePropertyOperation::with(
     *   day: ...,
     *   includeObjectsWithNoValueSet: ...,
     *   month: ...,
     *   operationType: ...,
     *   operator: ...,
     *   operatorName: ...,
     *   propertyType: ...,
     *   year: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DatePropertyOperation)
     *   ->withDay(...)
     *   ->withIncludeObjectsWithNoValueSet(...)
     *   ->withMonth(...)
     *   ->withOperationType(...)
     *   ->withOperator(...)
     *   ->withOperatorName(...)
     *   ->withPropertyType(...)
     *   ->withYear(...)
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
     * @param Month|value-of<Month> $month
     * @param Operator|value-of<Operator> $operator
     * @param PropertyType|value-of<PropertyType> $propertyType
     */
    public static function with(
        int $day,
        bool $includeObjectsWithNoValueSet,
        Month|string $month,
        string $operationType,
        Operator|string $operator,
        string $operatorName,
        int $year,
        PropertyType|string $propertyType = 'date',
        ?string $defaultValue = null,
    ): self {
        $self = new self;

        $self['day'] = $day;
        $self['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;
        $self['month'] = $month;
        $self['operationType'] = $operationType;
        $self['operator'] = $operator;
        $self['operatorName'] = $operatorName;
        $self['propertyType'] = $propertyType;
        $self['year'] = $year;

        null !== $defaultValue && $self['defaultValue'] = $defaultValue;

        return $self;
    }

    public function withDay(int $day): self
    {
        $self = clone $this;
        $self['day'] = $day;

        return $self;
    }

    public function withIncludeObjectsWithNoValueSet(
        bool $includeObjectsWithNoValueSet
    ): self {
        $self = clone $this;
        $self['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;

        return $self;
    }

    /**
     * @param Month|value-of<Month> $month
     */
    public function withMonth(Month|string $month): self
    {
        $self = clone $this;
        $self['month'] = $month;

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

    public function withYear(int $year): self
    {
        $self = clone $this;
        $self['year'] = $year;

        return $self;
    }

    public function withDefaultValue(string $defaultValue): self
    {
        $self = clone $this;
        $self['defaultValue'] = $defaultValue;

        return $self;
    }
}
