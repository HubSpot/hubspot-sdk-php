<?php

declare(strict_types=1);

namespace HubspotSDK\Events\Definitions;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Events\Definitions\DateTimePropertyOperation\Operator;
use HubspotSDK\Events\Definitions\DateTimePropertyOperation\PropertyType;

/**
 * @phpstan-type DateTimePropertyOperationShape = array{
 *   includeObjectsWithNoValueSet: bool,
 *   operationType: string,
 *   operator: Operator|value-of<Operator>,
 *   operatorName: string,
 *   propertyType: PropertyType|value-of<PropertyType>,
 *   requiresTimeZoneConversion: bool,
 *   timestamp: int,
 *   defaultValue?: string|null,
 *   renderSpec?: string|null,
 * }
 */
final class DateTimePropertyOperation implements BaseModel
{
    /** @use SdkModel<DateTimePropertyOperationShape> */
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

    #[Required]
    public bool $requiresTimeZoneConversion;

    #[Required]
    public int $timestamp;

    #[Optional]
    public ?string $defaultValue;

    #[Optional]
    public ?string $renderSpec;

    /**
     * `new DateTimePropertyOperation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DateTimePropertyOperation::with(
     *   includeObjectsWithNoValueSet: ...,
     *   operationType: ...,
     *   operator: ...,
     *   operatorName: ...,
     *   propertyType: ...,
     *   requiresTimeZoneConversion: ...,
     *   timestamp: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DateTimePropertyOperation)
     *   ->withIncludeObjectsWithNoValueSet(...)
     *   ->withOperationType(...)
     *   ->withOperator(...)
     *   ->withOperatorName(...)
     *   ->withPropertyType(...)
     *   ->withRequiresTimeZoneConversion(...)
     *   ->withTimestamp(...)
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
        string $operationType,
        Operator|string $operator,
        string $operatorName,
        bool $requiresTimeZoneConversion,
        int $timestamp,
        PropertyType|string $propertyType = 'datetime',
        ?string $defaultValue = null,
        ?string $renderSpec = null,
    ): self {
        $self = new self;

        $self['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;
        $self['operationType'] = $operationType;
        $self['operator'] = $operator;
        $self['operatorName'] = $operatorName;
        $self['propertyType'] = $propertyType;
        $self['requiresTimeZoneConversion'] = $requiresTimeZoneConversion;
        $self['timestamp'] = $timestamp;

        null !== $defaultValue && $self['defaultValue'] = $defaultValue;
        null !== $renderSpec && $self['renderSpec'] = $renderSpec;

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

    public function withRequiresTimeZoneConversion(
        bool $requiresTimeZoneConversion
    ): self {
        $self = clone $this;
        $self['requiresTimeZoneConversion'] = $requiresTimeZoneConversion;

        return $self;
    }

    public function withTimestamp(int $timestamp): self
    {
        $self = clone $this;
        $self['timestamp'] = $timestamp;

        return $self;
    }

    public function withDefaultValue(string $defaultValue): self
    {
        $self = clone $this;
        $self['defaultValue'] = $defaultValue;

        return $self;
    }

    public function withRenderSpec(string $renderSpec): self
    {
        $self = clone $this;
        $self['renderSpec'] = $renderSpec;

        return $self;
    }
}
