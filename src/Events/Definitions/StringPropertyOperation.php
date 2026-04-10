<?php

declare(strict_types=1);

namespace HubSpotSDK\Events\Definitions;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Events\Definitions\StringPropertyOperation\Operator;
use HubSpotSDK\Events\Definitions\StringPropertyOperation\PropertyType;

/**
 * @phpstan-type StringPropertyOperationShape = array{
 *   includeObjectsWithNoValueSet: bool,
 *   operationType: string,
 *   operator: Operator|value-of<Operator>,
 *   operatorName: string,
 *   propertyType: PropertyType|value-of<PropertyType>,
 *   value: string,
 *   defaultValue?: string|null,
 *   renderSpec?: string|null,
 * }
 */
final class StringPropertyOperation implements BaseModel
{
    /** @use SdkModel<StringPropertyOperationShape> */
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
    public string $value;

    #[Optional]
    public ?string $defaultValue;

    #[Optional]
    public ?string $renderSpec;

    /**
     * `new StringPropertyOperation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * StringPropertyOperation::with(
     *   includeObjectsWithNoValueSet: ...,
     *   operationType: ...,
     *   operator: ...,
     *   operatorName: ...,
     *   propertyType: ...,
     *   value: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new StringPropertyOperation)
     *   ->withIncludeObjectsWithNoValueSet(...)
     *   ->withOperationType(...)
     *   ->withOperator(...)
     *   ->withOperatorName(...)
     *   ->withPropertyType(...)
     *   ->withValue(...)
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
        string $value,
        PropertyType|string $propertyType = 'string',
        ?string $defaultValue = null,
        ?string $renderSpec = null,
    ): self {
        $self = new self;

        $self['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;
        $self['operationType'] = $operationType;
        $self['operator'] = $operator;
        $self['operatorName'] = $operatorName;
        $self['propertyType'] = $propertyType;
        $self['value'] = $value;

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

    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

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
