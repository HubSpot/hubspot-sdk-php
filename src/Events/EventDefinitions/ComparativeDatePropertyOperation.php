<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Events\EventDefinitions\ComparativeDatePropertyOperation\Operator;
use HubspotSDK\Events\EventDefinitions\ComparativeDatePropertyOperation\PropertyType;

/**
 * @phpstan-type ComparativeDatePropertyOperationShape = array{
 *   comparisonPropertyName: string,
 *   includeObjectsWithNoValueSet: bool,
 *   operationType: string,
 *   operator: value-of<Operator>,
 *   operatorName: string,
 *   propertyType: value-of<PropertyType>,
 *   defaultComparisonValue?: string|null,
 *   defaultValue?: string|null,
 * }
 */
final class ComparativeDatePropertyOperation implements BaseModel
{
    /** @use SdkModel<ComparativeDatePropertyOperationShape> */
    use SdkModel;

    #[Api]
    public string $comparisonPropertyName;

    #[Api]
    public bool $includeObjectsWithNoValueSet;

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

    #[Api(optional: true)]
    public ?string $defaultComparisonValue;

    #[Api(optional: true)]
    public ?string $defaultValue;

    /**
     * `new ComparativeDatePropertyOperation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ComparativeDatePropertyOperation::with(
     *   comparisonPropertyName: ...,
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
     * (new ComparativeDatePropertyOperation)
     *   ->withComparisonPropertyName(...)
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
     * @param Operator|value-of<Operator> $operator
     * @param PropertyType|value-of<PropertyType> $propertyType
     */
    public static function with(
        string $comparisonPropertyName,
        bool $includeObjectsWithNoValueSet,
        string $operationType,
        Operator|string $operator,
        string $operatorName,
        PropertyType|string $propertyType = 'datetime-comparative',
        ?string $defaultComparisonValue = null,
        ?string $defaultValue = null,
    ): self {
        $obj = new self;

        $obj->comparisonPropertyName = $comparisonPropertyName;
        $obj->includeObjectsWithNoValueSet = $includeObjectsWithNoValueSet;
        $obj->operationType = $operationType;
        $obj['operator'] = $operator;
        $obj->operatorName = $operatorName;
        $obj['propertyType'] = $propertyType;

        null !== $defaultComparisonValue && $obj->defaultComparisonValue = $defaultComparisonValue;
        null !== $defaultValue && $obj->defaultValue = $defaultValue;

        return $obj;
    }

    public function withComparisonPropertyName(
        string $comparisonPropertyName
    ): self {
        $obj = clone $this;
        $obj->comparisonPropertyName = $comparisonPropertyName;

        return $obj;
    }

    public function withIncludeObjectsWithNoValueSet(
        bool $includeObjectsWithNoValueSet
    ): self {
        $obj = clone $this;
        $obj->includeObjectsWithNoValueSet = $includeObjectsWithNoValueSet;

        return $obj;
    }

    public function withOperationType(string $operationType): self
    {
        $obj = clone $this;
        $obj->operationType = $operationType;

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
        $obj->operatorName = $operatorName;

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

    public function withDefaultComparisonValue(
        string $defaultComparisonValue
    ): self {
        $obj = clone $this;
        $obj->defaultComparisonValue = $defaultComparisonValue;

        return $obj;
    }

    public function withDefaultValue(string $defaultValue): self
    {
        $obj = clone $this;
        $obj->defaultValue = $defaultValue;

        return $obj;
    }
}
