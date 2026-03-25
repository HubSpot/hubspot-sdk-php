<?php

declare(strict_types=1);

namespace HubspotSDK\Events\Send;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Events\Send\RegexPropertyOperation\Operator;
use HubspotSDK\Events\Send\RegexPropertyOperation\PropertyType;

/**
 * @phpstan-type RegexPropertyOperationShape = array{
 *   caseSensitive: bool,
 *   includeObjectsWithNoValueSet: bool,
 *   operationType: string,
 *   operator: Operator|value-of<Operator>,
 *   operatorName: string,
 *   pattern: string,
 *   propertyType: PropertyType|value-of<PropertyType>,
 *   defaultValue?: string|null,
 *   renderSpec?: string|null,
 * }
 */
final class RegexPropertyOperation implements BaseModel
{
    /** @use SdkModel<RegexPropertyOperationShape> */
    use SdkModel;

    #[Required]
    public bool $caseSensitive;

    #[Required]
    public bool $includeObjectsWithNoValueSet;

    #[Required]
    public string $operationType;

    /** @var value-of<Operator> $operator */
    #[Required(enum: Operator::class)]
    public string $operator;

    #[Required]
    public string $operatorName;

    #[Required]
    public string $pattern;

    /** @var value-of<PropertyType> $propertyType */
    #[Required(enum: PropertyType::class)]
    public string $propertyType;

    #[Optional]
    public ?string $defaultValue;

    #[Optional]
    public ?string $renderSpec;

    /**
     * `new RegexPropertyOperation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RegexPropertyOperation::with(
     *   caseSensitive: ...,
     *   includeObjectsWithNoValueSet: ...,
     *   operationType: ...,
     *   operator: ...,
     *   operatorName: ...,
     *   pattern: ...,
     *   propertyType: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RegexPropertyOperation)
     *   ->withCaseSensitive(...)
     *   ->withIncludeObjectsWithNoValueSet(...)
     *   ->withOperationType(...)
     *   ->withOperator(...)
     *   ->withOperatorName(...)
     *   ->withPattern(...)
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
        bool $caseSensitive,
        bool $includeObjectsWithNoValueSet,
        string $operationType,
        Operator|string $operator,
        string $operatorName,
        string $pattern,
        PropertyType|string $propertyType = 'regex',
        ?string $defaultValue = null,
        ?string $renderSpec = null,
    ): self {
        $self = new self;

        $self['caseSensitive'] = $caseSensitive;
        $self['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;
        $self['operationType'] = $operationType;
        $self['operator'] = $operator;
        $self['operatorName'] = $operatorName;
        $self['pattern'] = $pattern;
        $self['propertyType'] = $propertyType;

        null !== $defaultValue && $self['defaultValue'] = $defaultValue;
        null !== $renderSpec && $self['renderSpec'] = $renderSpec;

        return $self;
    }

    public function withCaseSensitive(bool $caseSensitive): self
    {
        $self = clone $this;
        $self['caseSensitive'] = $caseSensitive;

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

    public function withPattern(string $pattern): self
    {
        $self = clone $this;
        $self['pattern'] = $pattern;

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
