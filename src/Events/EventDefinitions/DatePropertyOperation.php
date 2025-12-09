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
 *   month: value-of<Month>,
 *   operationType: string,
 *   operator: value-of<Operator>,
 *   operatorName: string,
 *   propertyType: value-of<PropertyType>,
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
        $obj = new self;

        $obj['day'] = $day;
        $obj['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;
        $obj['month'] = $month;
        $obj['operationType'] = $operationType;
        $obj['operator'] = $operator;
        $obj['operatorName'] = $operatorName;
        $obj['propertyType'] = $propertyType;
        $obj['year'] = $year;

        null !== $defaultValue && $obj['defaultValue'] = $defaultValue;

        return $obj;
    }

    public function withDay(int $day): self
    {
        $obj = clone $this;
        $obj['day'] = $day;

        return $obj;
    }

    public function withIncludeObjectsWithNoValueSet(
        bool $includeObjectsWithNoValueSet
    ): self {
        $obj = clone $this;
        $obj['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;

        return $obj;
    }

    /**
     * @param Month|value-of<Month> $month
     */
    public function withMonth(Month|string $month): self
    {
        $obj = clone $this;
        $obj['month'] = $month;

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

    public function withYear(int $year): self
    {
        $obj = clone $this;
        $obj['year'] = $year;

        return $obj;
    }

    public function withDefaultValue(string $defaultValue): self
    {
        $obj = clone $this;
        $obj['defaultValue'] = $defaultValue;

        return $obj;
    }
}
