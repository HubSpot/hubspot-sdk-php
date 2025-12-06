<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Events\EventDefinitions\RangedNumberPropertyOperation\Operator;
use HubspotSDK\Events\EventDefinitions\RangedNumberPropertyOperation\PropertyType;

/**
 * @phpstan-type RangedNumberPropertyOperationShape = array{
 *   includeObjectsWithNoValueSet: bool,
 *   lowerBound: int,
 *   operationType: string,
 *   operator: value-of<Operator>,
 *   operatorName: string,
 *   propertyType: value-of<PropertyType>,
 *   upperBound: int,
 *   defaultValue?: string|null,
 * }
 */
final class RangedNumberPropertyOperation implements BaseModel
{
    /** @use SdkModel<RangedNumberPropertyOperationShape> */
    use SdkModel;

    #[Api]
    public bool $includeObjectsWithNoValueSet;

    #[Api]
    public int $lowerBound;

    #[Api]
    public string $operationType;

    /** @var value-of<Operator> $operator */
    #[Api(enum: Operator::class)]
    public string $operator;

    #[Api]
    public string $operatorName;

    /** @var value-of<PropertyType> $propertyType */
    #[Api(enum: PropertyType::class)]
    public string $propertyType;

    #[Api]
    public int $upperBound;

    #[Api(optional: true)]
    public ?string $defaultValue;

    /**
     * `new RangedNumberPropertyOperation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RangedNumberPropertyOperation::with(
     *   includeObjectsWithNoValueSet: ...,
     *   lowerBound: ...,
     *   operationType: ...,
     *   operator: ...,
     *   operatorName: ...,
     *   propertyType: ...,
     *   upperBound: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RangedNumberPropertyOperation)
     *   ->withIncludeObjectsWithNoValueSet(...)
     *   ->withLowerBound(...)
     *   ->withOperationType(...)
     *   ->withOperator(...)
     *   ->withOperatorName(...)
     *   ->withPropertyType(...)
     *   ->withUpperBound(...)
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
     * @param PropertyType|value-of<PropertyType> $propertyType
     */
    public static function with(
        bool $includeObjectsWithNoValueSet,
        int $lowerBound,
        string $operationType,
        Operator|string $operator,
        string $operatorName,
        int $upperBound,
        PropertyType|string $propertyType = 'number-ranged',
        ?string $defaultValue = null,
    ): self {
        $obj = new self;

        $obj['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;
        $obj['lowerBound'] = $lowerBound;
        $obj['operationType'] = $operationType;
        $obj['operator'] = $operator;
        $obj['operatorName'] = $operatorName;
        $obj['propertyType'] = $propertyType;
        $obj['upperBound'] = $upperBound;

        null !== $defaultValue && $obj['defaultValue'] = $defaultValue;

        return $obj;
    }

    public function withIncludeObjectsWithNoValueSet(
        bool $includeObjectsWithNoValueSet
    ): self {
        $obj = clone $this;
        $obj['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;

        return $obj;
    }

    public function withLowerBound(int $lowerBound): self
    {
        $obj = clone $this;
        $obj['lowerBound'] = $lowerBound;

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

    public function withUpperBound(int $upperBound): self
    {
        $obj = clone $this;
        $obj['upperBound'] = $upperBound;

        return $obj;
    }

    public function withDefaultValue(string $defaultValue): self
    {
        $obj = clone $this;
        $obj['defaultValue'] = $defaultValue;

        return $obj;
    }
}
