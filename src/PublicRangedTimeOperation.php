<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicRangedTimeOperation\Type;

/**
 * @phpstan-type PublicRangedTimeOperationShape = array{
 *   includeObjectsWithNoValueSet: bool,
 *   lowerBoundTimePoint: PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime,
 *   operationType: string,
 *   operator: string,
 *   type: value-of<Type>,
 *   upperBoundTimePoint: PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime,
 *   lowerBoundEndpointBehavior?: string,
 *   propertyParser?: string,
 *   upperBoundEndpointBehavior?: string,
 * }
 */
final class PublicRangedTimeOperation implements BaseModel
{
    /** @use SdkModel<PublicRangedTimeOperationShape> */
    use SdkModel;

    #[Api]
    public bool $includeObjectsWithNoValueSet;

    #[Api]
    public PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime $lowerBoundTimePoint;

    #[Api]
    public string $operationType;

    #[Api]
    public string $operator;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api]
    public PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime $upperBoundTimePoint;

    #[Api(optional: true)]
    public ?string $lowerBoundEndpointBehavior;

    #[Api(optional: true)]
    public ?string $propertyParser;

    #[Api(optional: true)]
    public ?string $upperBoundEndpointBehavior;

    /**
     * `new PublicRangedTimeOperation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicRangedTimeOperation::with(
     *   includeObjectsWithNoValueSet: ...,
     *   lowerBoundTimePoint: ...,
     *   operationType: ...,
     *   operator: ...,
     *   type: ...,
     *   upperBoundTimePoint: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicRangedTimeOperation)
     *   ->withIncludeObjectsWithNoValueSet(...)
     *   ->withLowerBoundTimePoint(...)
     *   ->withOperationType(...)
     *   ->withOperator(...)
     *   ->withType(...)
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
     * @param Type|value-of<Type> $type
     */
    public static function with(
        bool $includeObjectsWithNoValueSet,
        PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime $lowerBoundTimePoint,
        string $operationType,
        string $operator,
        PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime $upperBoundTimePoint,
        Type|string $type = 'TIME_RANGED',
        ?string $lowerBoundEndpointBehavior = null,
        ?string $propertyParser = null,
        ?string $upperBoundEndpointBehavior = null,
    ): self {
        $obj = new self;

        $obj->includeObjectsWithNoValueSet = $includeObjectsWithNoValueSet;
        $obj->lowerBoundTimePoint = $lowerBoundTimePoint;
        $obj->operationType = $operationType;
        $obj->operator = $operator;
        $obj['type'] = $type;
        $obj->upperBoundTimePoint = $upperBoundTimePoint;

        null !== $lowerBoundEndpointBehavior && $obj->lowerBoundEndpointBehavior = $lowerBoundEndpointBehavior;
        null !== $propertyParser && $obj->propertyParser = $propertyParser;
        null !== $upperBoundEndpointBehavior && $obj->upperBoundEndpointBehavior = $upperBoundEndpointBehavior;

        return $obj;
    }

    public function withIncludeObjectsWithNoValueSet(
        bool $includeObjectsWithNoValueSet
    ): self {
        $obj = clone $this;
        $obj->includeObjectsWithNoValueSet = $includeObjectsWithNoValueSet;

        return $obj;
    }

    public function withLowerBoundTimePoint(
        PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime $lowerBoundTimePoint,
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

    public function withOperator(string $operator): self
    {
        $obj = clone $this;
        $obj->operator = $operator;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    public function withUpperBoundTimePoint(
        PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime $upperBoundTimePoint,
    ): self {
        $obj = clone $this;
        $obj->upperBoundTimePoint = $upperBoundTimePoint;

        return $obj;
    }

    public function withLowerBoundEndpointBehavior(
        string $lowerBoundEndpointBehavior
    ): self {
        $obj = clone $this;
        $obj->lowerBoundEndpointBehavior = $lowerBoundEndpointBehavior;

        return $obj;
    }

    public function withPropertyParser(string $propertyParser): self
    {
        $obj = clone $this;
        $obj->propertyParser = $propertyParser;

        return $obj;
    }

    public function withUpperBoundEndpointBehavior(
        string $upperBoundEndpointBehavior
    ): self {
        $obj = clone $this;
        $obj->upperBoundEndpointBehavior = $upperBoundEndpointBehavior;

        return $obj;
    }
}
