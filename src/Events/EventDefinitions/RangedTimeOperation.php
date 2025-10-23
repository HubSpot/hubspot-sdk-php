<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Events\EventDefinitions\RangedTimeOperation\LowerBoundEndpointBehavior;
use HubspotSDK\Events\EventDefinitions\RangedTimeOperation\Operator;
use HubspotSDK\Events\EventDefinitions\RangedTimeOperation\PropertyParser;
use HubspotSDK\Events\EventDefinitions\RangedTimeOperation\PropertyType;
use HubspotSDK\Events\EventDefinitions\RangedTimeOperation\UpperBoundEndpointBehavior;

/**
 * @phpstan-type ranged_time_operation = array{
 *   includeObjectsWithNoValueSet: bool,
 *   lowerBoundEndpointBehavior: value-of<LowerBoundEndpointBehavior>,
 *   lowerBoundTimePoint: DatePoint|IndexedTimePoint|PropertyReferencedTime,
 *   operationType: string,
 *   operator: value-of<Operator>,
 *   operatorName: string,
 *   propertyParser: value-of<PropertyParser>,
 *   propertyType: value-of<PropertyType>,
 *   type: string,
 *   upperBoundEndpointBehavior: value-of<UpperBoundEndpointBehavior>,
 *   upperBoundTimePoint: DatePoint|IndexedTimePoint|PropertyReferencedTime,
 *   defaultValue?: string,
 * }
 */
final class RangedTimeOperation implements BaseModel
{
    /** @use SdkModel<ranged_time_operation> */
    use SdkModel;

    #[Api]
    public bool $includeObjectsWithNoValueSet;

    /** @var value-of<LowerBoundEndpointBehavior> $lowerBoundEndpointBehavior */
    #[Api(enum: LowerBoundEndpointBehavior::class)]
    public string $lowerBoundEndpointBehavior;

    #[Api]
    public DatePoint|IndexedTimePoint|PropertyReferencedTime $lowerBoundTimePoint;

    #[Api]
    public string $operationType;

    /** @var value-of<Operator> $operator */
    #[Api(enum: Operator::class)]
    public string $operator;

    #[Api]
    public string $operatorName;

    /** @var value-of<PropertyParser> $propertyParser */
    #[Api(enum: PropertyParser::class)]
    public string $propertyParser;

    /** @var value-of<PropertyType> $propertyType */
    #[Api(enum: PropertyType::class)]
    public string $propertyType;

    #[Api]
    public string $type;

    /** @var value-of<UpperBoundEndpointBehavior> $upperBoundEndpointBehavior */
    #[Api(enum: UpperBoundEndpointBehavior::class)]
    public string $upperBoundEndpointBehavior;

    #[Api]
    public DatePoint|IndexedTimePoint|PropertyReferencedTime $upperBoundTimePoint;

    #[Api(optional: true)]
    public ?string $defaultValue;

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
     * @param Operator|value-of<Operator> $operator
     * @param PropertyParser|value-of<PropertyParser> $propertyParser
     * @param UpperBoundEndpointBehavior|value-of<UpperBoundEndpointBehavior> $upperBoundEndpointBehavior
     * @param PropertyType|value-of<PropertyType> $propertyType
     */
    public static function with(
        bool $includeObjectsWithNoValueSet,
        LowerBoundEndpointBehavior|string $lowerBoundEndpointBehavior,
        DatePoint|IndexedTimePoint|PropertyReferencedTime $lowerBoundTimePoint,
        string $operationType,
        Operator|string $operator,
        string $operatorName,
        PropertyParser|string $propertyParser,
        string $type,
        UpperBoundEndpointBehavior|string $upperBoundEndpointBehavior,
        DatePoint|IndexedTimePoint|PropertyReferencedTime $upperBoundTimePoint,
        PropertyType|string $propertyType = 'rangedtime',
        ?string $defaultValue = null,
    ): self {
        $obj = new self;

        $obj->includeObjectsWithNoValueSet = $includeObjectsWithNoValueSet;
        $obj['lowerBoundEndpointBehavior'] = $lowerBoundEndpointBehavior;
        $obj->lowerBoundTimePoint = $lowerBoundTimePoint;
        $obj->operationType = $operationType;
        $obj['operator'] = $operator;
        $obj->operatorName = $operatorName;
        $obj['propertyParser'] = $propertyParser;
        $obj['propertyType'] = $propertyType;
        $obj->type = $type;
        $obj['upperBoundEndpointBehavior'] = $upperBoundEndpointBehavior;
        $obj->upperBoundTimePoint = $upperBoundTimePoint;

        null !== $defaultValue && $obj->defaultValue = $defaultValue;

        return $obj;
    }

    public function withIncludeObjectsWithNoValueSet(
        bool $includeObjectsWithNoValueSet
    ): self {
        $obj = clone $this;
        $obj->includeObjectsWithNoValueSet = $includeObjectsWithNoValueSet;

        return $obj;
    }

    /**
     * @param LowerBoundEndpointBehavior|value-of<LowerBoundEndpointBehavior> $lowerBoundEndpointBehavior
     */
    public function withLowerBoundEndpointBehavior(
        LowerBoundEndpointBehavior|string $lowerBoundEndpointBehavior
    ): self {
        $obj = clone $this;
        $obj['lowerBoundEndpointBehavior'] = $lowerBoundEndpointBehavior;

        return $obj;
    }

    public function withLowerBoundTimePoint(
        DatePoint|IndexedTimePoint|PropertyReferencedTime $lowerBoundTimePoint
    ): self {
        $obj = clone $this;
        $obj->lowerBoundTimePoint = $lowerBoundTimePoint;

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
     * @param PropertyParser|value-of<PropertyParser> $propertyParser
     */
    public function withPropertyParser(
        PropertyParser|string $propertyParser
    ): self {
        $obj = clone $this;
        $obj['propertyParser'] = $propertyParser;

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

    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj->type = $type;

        return $obj;
    }

    /**
     * @param UpperBoundEndpointBehavior|value-of<UpperBoundEndpointBehavior> $upperBoundEndpointBehavior
     */
    public function withUpperBoundEndpointBehavior(
        UpperBoundEndpointBehavior|string $upperBoundEndpointBehavior
    ): self {
        $obj = clone $this;
        $obj['upperBoundEndpointBehavior'] = $upperBoundEndpointBehavior;

        return $obj;
    }

    public function withUpperBoundTimePoint(
        DatePoint|IndexedTimePoint|PropertyReferencedTime $upperBoundTimePoint
    ): self {
        $obj = clone $this;
        $obj->upperBoundTimePoint = $upperBoundTimePoint;

        return $obj;
    }

    public function withDefaultValue(string $defaultValue): self
    {
        $obj = clone $this;
        $obj->defaultValue = $defaultValue;

        return $obj;
    }
}
