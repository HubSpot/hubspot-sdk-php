<?php

declare(strict_types=1);

namespace HubSpotSDK\Events\Definitions;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Events\Definitions\TimePointOperation\EndpointBehavior;
use HubSpotSDK\Events\Definitions\TimePointOperation\Operator;
use HubSpotSDK\Events\Definitions\TimePointOperation\PropertyParser;
use HubSpotSDK\Events\Definitions\TimePointOperation\PropertyType;

/**
 * @phpstan-import-type TimePointVariants from \HubSpotSDK\Events\Definitions\TimePointOperation\TimePoint
 * @phpstan-import-type TimePointShape from \HubSpotSDK\Events\Definitions\TimePointOperation\TimePoint
 *
 * @phpstan-type TimePointOperationShape = array{
 *   endpointBehavior: EndpointBehavior|value-of<EndpointBehavior>,
 *   includeObjectsWithNoValueSet: bool,
 *   operationType: string,
 *   operator: Operator|value-of<Operator>,
 *   operatorName: string,
 *   propertyParser: PropertyParser|value-of<PropertyParser>,
 *   propertyType: PropertyType|value-of<PropertyType>,
 *   timePoint: TimePointShape,
 *   type: string,
 *   defaultValue?: string|null,
 *   renderSpec?: string|null,
 * }
 */
final class TimePointOperation implements BaseModel
{
    /** @use SdkModel<TimePointOperationShape> */
    use SdkModel;

    /** @var value-of<EndpointBehavior> $endpointBehavior */
    #[Required(enum: EndpointBehavior::class)]
    public string $endpointBehavior;

    #[Required]
    public bool $includeObjectsWithNoValueSet;

    #[Required]
    public string $operationType;

    /** @var value-of<Operator> $operator */
    #[Required(enum: Operator::class)]
    public string $operator;

    #[Required]
    public string $operatorName;

    /** @var value-of<PropertyParser> $propertyParser */
    #[Required(enum: PropertyParser::class)]
    public string $propertyParser;

    /** @var value-of<PropertyType> $propertyType */
    #[Required(enum: PropertyType::class)]
    public string $propertyType;

    /** @var TimePointVariants $timePoint */
    #[Required]
    public DatePoint|IndexedTimePoint|PropertyReferencedTime $timePoint;

    #[Required]
    public string $type;

    #[Optional]
    public ?string $defaultValue;

    #[Optional]
    public ?string $renderSpec;

    /**
     * `new TimePointOperation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TimePointOperation::with(
     *   endpointBehavior: ...,
     *   includeObjectsWithNoValueSet: ...,
     *   operationType: ...,
     *   operator: ...,
     *   operatorName: ...,
     *   propertyParser: ...,
     *   propertyType: ...,
     *   timePoint: ...,
     *   type: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TimePointOperation)
     *   ->withEndpointBehavior(...)
     *   ->withIncludeObjectsWithNoValueSet(...)
     *   ->withOperationType(...)
     *   ->withOperator(...)
     *   ->withOperatorName(...)
     *   ->withPropertyParser(...)
     *   ->withPropertyType(...)
     *   ->withTimePoint(...)
     *   ->withType(...)
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
     * @param EndpointBehavior|value-of<EndpointBehavior> $endpointBehavior
     * @param Operator|value-of<Operator> $operator
     * @param PropertyParser|value-of<PropertyParser> $propertyParser
     * @param TimePointShape $timePoint
     * @param PropertyType|value-of<PropertyType> $propertyType
     */
    public static function with(
        EndpointBehavior|string $endpointBehavior,
        bool $includeObjectsWithNoValueSet,
        string $operationType,
        Operator|string $operator,
        string $operatorName,
        PropertyParser|string $propertyParser,
        DatePoint|array|IndexedTimePoint|PropertyReferencedTime $timePoint,
        string $type,
        PropertyType|string $propertyType = 'timepoint',
        ?string $defaultValue = null,
        ?string $renderSpec = null,
    ): self {
        $self = new self;

        $self['endpointBehavior'] = $endpointBehavior;
        $self['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;
        $self['operationType'] = $operationType;
        $self['operator'] = $operator;
        $self['operatorName'] = $operatorName;
        $self['propertyParser'] = $propertyParser;
        $self['propertyType'] = $propertyType;
        $self['timePoint'] = $timePoint;
        $self['type'] = $type;

        null !== $defaultValue && $self['defaultValue'] = $defaultValue;
        null !== $renderSpec && $self['renderSpec'] = $renderSpec;

        return $self;
    }

    /**
     * @param EndpointBehavior|value-of<EndpointBehavior> $endpointBehavior
     */
    public function withEndpointBehavior(
        EndpointBehavior|string $endpointBehavior
    ): self {
        $self = clone $this;
        $self['endpointBehavior'] = $endpointBehavior;

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
     * @param PropertyParser|value-of<PropertyParser> $propertyParser
     */
    public function withPropertyParser(
        PropertyParser|string $propertyParser
    ): self {
        $self = clone $this;
        $self['propertyParser'] = $propertyParser;

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

    /**
     * @param TimePointShape $timePoint
     */
    public function withTimePoint(
        DatePoint|array|IndexedTimePoint|PropertyReferencedTime $timePoint
    ): self {
        $self = clone $this;
        $self['timePoint'] = $timePoint;

        return $self;
    }

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

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
