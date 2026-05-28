<?php

declare(strict_types=1);

namespace HubSpotSDK\Events\Definitions;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Events\Definitions\RangedTimeOperation\LowerBoundEndpointBehavior;
use HubSpotSDK\Events\Definitions\RangedTimeOperation\LowerBoundTimePoint;
use HubSpotSDK\Events\Definitions\RangedTimeOperation\Operator;
use HubSpotSDK\Events\Definitions\RangedTimeOperation\PropertyParser;
use HubSpotSDK\Events\Definitions\RangedTimeOperation\PropertyType;
use HubSpotSDK\Events\Definitions\RangedTimeOperation\UpperBoundEndpointBehavior;
use HubSpotSDK\Events\Definitions\RangedTimeOperation\UpperBoundTimePoint;

/**
 * @phpstan-import-type LowerBoundTimePointVariants from \HubSpotSDK\Events\Definitions\RangedTimeOperation\LowerBoundTimePoint
 * @phpstan-import-type UpperBoundTimePointVariants from \HubSpotSDK\Events\Definitions\RangedTimeOperation\UpperBoundTimePoint
 * @phpstan-import-type LowerBoundTimePointShape from \HubSpotSDK\Events\Definitions\RangedTimeOperation\LowerBoundTimePoint
 * @phpstan-import-type UpperBoundTimePointShape from \HubSpotSDK\Events\Definitions\RangedTimeOperation\UpperBoundTimePoint
 *
 * @phpstan-type RangedTimeOperationShape = array{
 *   includeObjectsWithNoValueSet: bool,
 *   lowerBoundEndpointBehavior: LowerBoundEndpointBehavior|value-of<LowerBoundEndpointBehavior>,
 *   lowerBoundTimePoint: LowerBoundTimePointShape,
 *   operationType: string,
 *   operator: Operator|value-of<Operator>,
 *   operatorName: string,
 *   propertyParser: PropertyParser|value-of<PropertyParser>,
 *   propertyType: PropertyType|value-of<PropertyType>,
 *   type: string,
 *   upperBoundEndpointBehavior: UpperBoundEndpointBehavior|value-of<UpperBoundEndpointBehavior>,
 *   upperBoundTimePoint: UpperBoundTimePointShape,
 *   defaultValue?: string|null,
 *   renderSpec?: string|null,
 * }
 */
final class RangedTimeOperation implements BaseModel
{
    /** @use SdkModel<RangedTimeOperationShape> */
    use SdkModel;

    #[Required]
    public bool $includeObjectsWithNoValueSet;

    /** @var value-of<LowerBoundEndpointBehavior> $lowerBoundEndpointBehavior */
    #[Required(enum: LowerBoundEndpointBehavior::class)]
    public string $lowerBoundEndpointBehavior;

    /** @var LowerBoundTimePointVariants $lowerBoundTimePoint */
    #[Required(union: LowerBoundTimePoint::class)]
    public DatePoint|IndexedTimePoint|PropertyReferencedTime $lowerBoundTimePoint;

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

    #[Required]
    public string $type;

    /** @var value-of<UpperBoundEndpointBehavior> $upperBoundEndpointBehavior */
    #[Required(enum: UpperBoundEndpointBehavior::class)]
    public string $upperBoundEndpointBehavior;

    /** @var UpperBoundTimePointVariants $upperBoundTimePoint */
    #[Required(union: UpperBoundTimePoint::class)]
    public DatePoint|IndexedTimePoint|PropertyReferencedTime $upperBoundTimePoint;

    #[Optional]
    public ?string $defaultValue;

    #[Optional]
    public ?string $renderSpec;

    /**
     * `new RangedTimeOperation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RangedTimeOperation::with(
     *   includeObjectsWithNoValueSet: ...,
     *   lowerBoundEndpointBehavior: ...,
     *   lowerBoundTimePoint: ...,
     *   operationType: ...,
     *   operator: ...,
     *   operatorName: ...,
     *   propertyParser: ...,
     *   propertyType: ...,
     *   type: ...,
     *   upperBoundEndpointBehavior: ...,
     *   upperBoundTimePoint: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RangedTimeOperation)
     *   ->withIncludeObjectsWithNoValueSet(...)
     *   ->withLowerBoundEndpointBehavior(...)
     *   ->withLowerBoundTimePoint(...)
     *   ->withOperationType(...)
     *   ->withOperator(...)
     *   ->withOperatorName(...)
     *   ->withPropertyParser(...)
     *   ->withPropertyType(...)
     *   ->withType(...)
     *   ->withUpperBoundEndpointBehavior(...)
     *   ->withUpperBoundTimePoint(...)
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
     * @param LowerBoundEndpointBehavior|value-of<LowerBoundEndpointBehavior> $lowerBoundEndpointBehavior
     * @param LowerBoundTimePointShape $lowerBoundTimePoint
     * @param Operator|value-of<Operator> $operator
     * @param PropertyParser|value-of<PropertyParser> $propertyParser
     * @param UpperBoundEndpointBehavior|value-of<UpperBoundEndpointBehavior> $upperBoundEndpointBehavior
     * @param UpperBoundTimePointShape $upperBoundTimePoint
     * @param PropertyType|value-of<PropertyType> $propertyType
     */
    public static function with(
        bool $includeObjectsWithNoValueSet,
        LowerBoundEndpointBehavior|string $lowerBoundEndpointBehavior,
        DatePoint|array|IndexedTimePoint|PropertyReferencedTime $lowerBoundTimePoint,
        string $operationType,
        Operator|string $operator,
        string $operatorName,
        PropertyParser|string $propertyParser,
        string $type,
        UpperBoundEndpointBehavior|string $upperBoundEndpointBehavior,
        DatePoint|array|IndexedTimePoint|PropertyReferencedTime $upperBoundTimePoint,
        PropertyType|string $propertyType = 'rangedtime',
        ?string $defaultValue = null,
        ?string $renderSpec = null,
    ): self {
        $self = new self;

        $self['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;
        $self['lowerBoundEndpointBehavior'] = $lowerBoundEndpointBehavior;
        $self['lowerBoundTimePoint'] = $lowerBoundTimePoint;
        $self['operationType'] = $operationType;
        $self['operator'] = $operator;
        $self['operatorName'] = $operatorName;
        $self['propertyParser'] = $propertyParser;
        $self['propertyType'] = $propertyType;
        $self['type'] = $type;
        $self['upperBoundEndpointBehavior'] = $upperBoundEndpointBehavior;
        $self['upperBoundTimePoint'] = $upperBoundTimePoint;

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

    /**
     * @param LowerBoundEndpointBehavior|value-of<LowerBoundEndpointBehavior> $lowerBoundEndpointBehavior
     */
    public function withLowerBoundEndpointBehavior(
        LowerBoundEndpointBehavior|string $lowerBoundEndpointBehavior
    ): self {
        $self = clone $this;
        $self['lowerBoundEndpointBehavior'] = $lowerBoundEndpointBehavior;

        return $self;
    }

    /**
     * @param LowerBoundTimePointShape $lowerBoundTimePoint
     */
    public function withLowerBoundTimePoint(
        DatePoint|array|IndexedTimePoint|PropertyReferencedTime $lowerBoundTimePoint
    ): self {
        $self = clone $this;
        $self['lowerBoundTimePoint'] = $lowerBoundTimePoint;

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

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * @param UpperBoundEndpointBehavior|value-of<UpperBoundEndpointBehavior> $upperBoundEndpointBehavior
     */
    public function withUpperBoundEndpointBehavior(
        UpperBoundEndpointBehavior|string $upperBoundEndpointBehavior
    ): self {
        $self = clone $this;
        $self['upperBoundEndpointBehavior'] = $upperBoundEndpointBehavior;

        return $self;
    }

    /**
     * @param UpperBoundTimePointShape $upperBoundTimePoint
     */
    public function withUpperBoundTimePoint(
        DatePoint|array|IndexedTimePoint|PropertyReferencedTime $upperBoundTimePoint
    ): self {
        $self = clone $this;
        $self['upperBoundTimePoint'] = $upperBoundTimePoint;

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
