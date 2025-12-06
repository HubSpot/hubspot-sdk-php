<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Events\EventDefinitions\RollingPropertyUpdatedOperation\Operator;
use HubspotSDK\Events\EventDefinitions\RollingPropertyUpdatedOperation\PropertyType;

/**
 * @phpstan-type RollingPropertyUpdatedOperationShape = array{
 *   includeObjectsWithNoValueSet: bool,
 *   numberOfDays: int,
 *   operationType: string,
 *   operator: value-of<Operator>,
 *   operatorName: string,
 *   propertyType: value-of<PropertyType>,
 *   defaultValue?: string|null,
 * }
 */
final class RollingPropertyUpdatedOperation implements BaseModel
{
    /** @use SdkModel<RollingPropertyUpdatedOperationShape> */
    use SdkModel;

    #[Api]
    public bool $includeObjectsWithNoValueSet;

    #[Api]
    public int $numberOfDays;

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
    public ?string $defaultValue;

    /**
     * `new RollingPropertyUpdatedOperation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RollingPropertyUpdatedOperation::with(
     *   includeObjectsWithNoValueSet: ...,
     *   numberOfDays: ...,
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
     * (new RollingPropertyUpdatedOperation)
     *   ->withIncludeObjectsWithNoValueSet(...)
     *   ->withNumberOfDays(...)
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
        bool $includeObjectsWithNoValueSet,
        int $numberOfDays,
        string $operationType,
        Operator|string $operator,
        string $operatorName,
        PropertyType|string $propertyType = 'rolling-property-updated',
        ?string $defaultValue = null,
    ): self {
        $obj = new self;

        $obj['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;
        $obj['numberOfDays'] = $numberOfDays;
        $obj['operationType'] = $operationType;
        $obj['operator'] = $operator;
        $obj['operatorName'] = $operatorName;
        $obj['propertyType'] = $propertyType;

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

    public function withNumberOfDays(int $numberOfDays): self
    {
        $obj = clone $this;
        $obj['numberOfDays'] = $numberOfDays;

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
}
