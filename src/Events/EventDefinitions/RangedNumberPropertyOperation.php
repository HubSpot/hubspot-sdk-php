<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
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

    #[Required]
    public bool $includeObjectsWithNoValueSet;

    #[Required]
    public int $lowerBound;

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
    public int $upperBound;

    #[Optional]
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
        $self = new self;

        $self['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;
        $self['lowerBound'] = $lowerBound;
        $self['operationType'] = $operationType;
        $self['operator'] = $operator;
        $self['operatorName'] = $operatorName;
        $self['propertyType'] = $propertyType;
        $self['upperBound'] = $upperBound;

        null !== $defaultValue && $self['defaultValue'] = $defaultValue;

        return $self;
    }

    public function withIncludeObjectsWithNoValueSet(
        bool $includeObjectsWithNoValueSet
    ): self {
        $self = clone $this;
        $self['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;

        return $self;
    }

    public function withLowerBound(int $lowerBound): self
    {
        $self = clone $this;
        $self['lowerBound'] = $lowerBound;

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

    public function withUpperBound(int $upperBound): self
    {
        $self = clone $this;
        $self['upperBound'] = $upperBound;

        return $self;
    }

    public function withDefaultValue(string $defaultValue): self
    {
        $self = clone $this;
        $self['defaultValue'] = $defaultValue;

        return $self;
    }
}
