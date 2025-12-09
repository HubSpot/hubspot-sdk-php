<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Events\EventDefinitions\RangedDatePropertyOperation\Operator;
use HubspotSDK\Events\EventDefinitions\RangedDatePropertyOperation\PropertyType;

/**
 * @phpstan-type RangedDatePropertyOperationShape = array{
 *   includeObjectsWithNoValueSet: bool,
 *   lowerBoundTimestamp: int,
 *   operationType: string,
 *   operator: value-of<Operator>,
 *   operatorName: string,
 *   propertyType: value-of<PropertyType>,
 *   requiresTimeZoneConversion: bool,
 *   upperBoundTimestamp: int,
 *   defaultValue?: string|null,
 * }
 */
final class RangedDatePropertyOperation implements BaseModel
{
    /** @use SdkModel<RangedDatePropertyOperationShape> */
    use SdkModel;

    #[Required]
    public bool $includeObjectsWithNoValueSet;

    #[Required]
    public int $lowerBoundTimestamp;

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
    public bool $requiresTimeZoneConversion;

    #[Required]
    public int $upperBoundTimestamp;

    #[Optional]
    public ?string $defaultValue;

    /**
     * `new RangedDatePropertyOperation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RangedDatePropertyOperation::with(
     *   includeObjectsWithNoValueSet: ...,
     *   lowerBoundTimestamp: ...,
     *   operationType: ...,
     *   operator: ...,
     *   operatorName: ...,
     *   propertyType: ...,
     *   requiresTimeZoneConversion: ...,
     *   upperBoundTimestamp: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RangedDatePropertyOperation)
     *   ->withIncludeObjectsWithNoValueSet(...)
     *   ->withLowerBoundTimestamp(...)
     *   ->withOperationType(...)
     *   ->withOperator(...)
     *   ->withOperatorName(...)
     *   ->withPropertyType(...)
     *   ->withRequiresTimeZoneConversion(...)
     *   ->withUpperBoundTimestamp(...)
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
        int $lowerBoundTimestamp,
        string $operationType,
        Operator|string $operator,
        string $operatorName,
        bool $requiresTimeZoneConversion,
        int $upperBoundTimestamp,
        PropertyType|string $propertyType = 'datetime-ranged',
        ?string $defaultValue = null,
    ): self {
        $self = new self;

        $self['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;
        $self['lowerBoundTimestamp'] = $lowerBoundTimestamp;
        $self['operationType'] = $operationType;
        $self['operator'] = $operator;
        $self['operatorName'] = $operatorName;
        $self['propertyType'] = $propertyType;
        $self['requiresTimeZoneConversion'] = $requiresTimeZoneConversion;
        $self['upperBoundTimestamp'] = $upperBoundTimestamp;

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

    public function withLowerBoundTimestamp(int $lowerBoundTimestamp): self
    {
        $self = clone $this;
        $self['lowerBoundTimestamp'] = $lowerBoundTimestamp;

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

    public function withRequiresTimeZoneConversion(
        bool $requiresTimeZoneConversion
    ): self {
        $self = clone $this;
        $self['requiresTimeZoneConversion'] = $requiresTimeZoneConversion;

        return $self;
    }

    public function withUpperBoundTimestamp(int $upperBoundTimestamp): self
    {
        $self = clone $this;
        $self['upperBoundTimestamp'] = $upperBoundTimestamp;

        return $self;
    }

    public function withDefaultValue(string $defaultValue): self
    {
        $self = clone $this;
        $self['defaultValue'] = $defaultValue;

        return $self;
    }
}
