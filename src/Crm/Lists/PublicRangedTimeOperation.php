<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Lists\PublicRangedTimeOperation\LowerBoundTimePoint;
use HubSpotSDK\Crm\Lists\PublicRangedTimeOperation\OperationType;
use HubSpotSDK\Crm\Lists\PublicRangedTimeOperation\Type;
use HubSpotSDK\Crm\Lists\PublicRangedTimeOperation\UpperBoundTimePoint;

/**
 * @phpstan-import-type LowerBoundTimePointVariants from \HubSpotSDK\Crm\Lists\PublicRangedTimeOperation\LowerBoundTimePoint
 * @phpstan-import-type UpperBoundTimePointVariants from \HubSpotSDK\Crm\Lists\PublicRangedTimeOperation\UpperBoundTimePoint
 * @phpstan-import-type LowerBoundTimePointShape from \HubSpotSDK\Crm\Lists\PublicRangedTimeOperation\LowerBoundTimePoint
 * @phpstan-import-type UpperBoundTimePointShape from \HubSpotSDK\Crm\Lists\PublicRangedTimeOperation\UpperBoundTimePoint
 *
 * @phpstan-type PublicRangedTimeOperationShape = array{
 *   includeObjectsWithNoValueSet: bool,
 *   lowerBoundTimePoint: LowerBoundTimePointShape,
 *   operationType: OperationType|value-of<OperationType>,
 *   operator: string,
 *   type: Type|value-of<Type>,
 *   upperBoundTimePoint: UpperBoundTimePointShape,
 *   lowerBoundEndpointBehavior?: string|null,
 *   propertyParser?: string|null,
 *   upperBoundEndpointBehavior?: string|null,
 * }
 */
final class PublicRangedTimeOperation implements BaseModel
{
    /** @use SdkModel<PublicRangedTimeOperationShape> */
    use SdkModel;

    /**
     * Indicates whether objects with no value set for the property should be included in the operation.
     */
    #[Required]
    public bool $includeObjectsWithNoValueSet;

    /**
     * Defines the lower bound time point for the operation.
     *
     * @var LowerBoundTimePointVariants $lowerBoundTimePoint
     */
    #[Required(union: LowerBoundTimePoint::class)]
    public PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime $lowerBoundTimePoint;

    /**
     * Specifies the type of operation (TIME_RANGED).
     *
     * @var value-of<OperationType> $operationType
     */
    #[Required(enum: OperationType::class)]
    public string $operationType;

    /**
     * Defines the operation to be applied within the time range (IS_BETWEEN, IS_NOT_BETWEEN).
     */
    #[Required]
    public string $operator;

    /**
     * Specifies the type of operation (TIME_RANGED).
     *
     * @var value-of<Type> $type
     */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * Defines the upper bound time point for the operation.
     *
     * @var UpperBoundTimePointVariants $upperBoundTimePoint
     */
    #[Required(union: UpperBoundTimePoint::class)]
    public PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime $upperBoundTimePoint;

    /**
     * Describes the behavior at the lower bound endpoint of the time range.
     */
    #[Optional]
    public ?string $lowerBoundEndpointBehavior;

    /**
     * Specifies the parser used for the property in the operation.
     */
    #[Optional]
    public ?string $propertyParser;

    /**
     * Describes the behavior at the upper bound endpoint of the time range.
     */
    #[Optional]
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
     * @param LowerBoundTimePointShape $lowerBoundTimePoint
     * @param OperationType|value-of<OperationType> $operationType
     * @param UpperBoundTimePointShape $upperBoundTimePoint
     * @param Type|value-of<Type> $type
     */
    public static function with(
        bool $includeObjectsWithNoValueSet,
        PublicDatePoint|array|PublicIndexedTimePoint|PublicPropertyReferencedTime $lowerBoundTimePoint,
        OperationType|string $operationType,
        string $operator,
        PublicDatePoint|array|PublicIndexedTimePoint|PublicPropertyReferencedTime $upperBoundTimePoint,
        Type|string $type = 'TIME_RANGED',
        ?string $lowerBoundEndpointBehavior = null,
        ?string $propertyParser = null,
        ?string $upperBoundEndpointBehavior = null,
    ): self {
        $self = new self;

        $self['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;
        $self['lowerBoundTimePoint'] = $lowerBoundTimePoint;
        $self['operationType'] = $operationType;
        $self['operator'] = $operator;
        $self['type'] = $type;
        $self['upperBoundTimePoint'] = $upperBoundTimePoint;

        null !== $lowerBoundEndpointBehavior && $self['lowerBoundEndpointBehavior'] = $lowerBoundEndpointBehavior;
        null !== $propertyParser && $self['propertyParser'] = $propertyParser;
        null !== $upperBoundEndpointBehavior && $self['upperBoundEndpointBehavior'] = $upperBoundEndpointBehavior;

        return $self;
    }

    /**
     * Indicates whether objects with no value set for the property should be included in the operation.
     */
    public function withIncludeObjectsWithNoValueSet(
        bool $includeObjectsWithNoValueSet
    ): self {
        $self = clone $this;
        $self['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;

        return $self;
    }

    /**
     * Defines the lower bound time point for the operation.
     *
     * @param LowerBoundTimePointShape $lowerBoundTimePoint
     */
    public function withLowerBoundTimePoint(
        PublicDatePoint|array|PublicIndexedTimePoint|PublicPropertyReferencedTime $lowerBoundTimePoint,
    ): self {
        $self = clone $this;
        $self['lowerBoundTimePoint'] = $lowerBoundTimePoint;

        return $self;
    }

    /**
     * Specifies the type of operation (TIME_RANGED).
     *
     * @param OperationType|value-of<OperationType> $operationType
     */
    public function withOperationType(OperationType|string $operationType): self
    {
        $self = clone $this;
        $self['operationType'] = $operationType;

        return $self;
    }

    /**
     * Defines the operation to be applied within the time range (IS_BETWEEN, IS_NOT_BETWEEN).
     */
    public function withOperator(string $operator): self
    {
        $self = clone $this;
        $self['operator'] = $operator;

        return $self;
    }

    /**
     * Specifies the type of operation (TIME_RANGED).
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Defines the upper bound time point for the operation.
     *
     * @param UpperBoundTimePointShape $upperBoundTimePoint
     */
    public function withUpperBoundTimePoint(
        PublicDatePoint|array|PublicIndexedTimePoint|PublicPropertyReferencedTime $upperBoundTimePoint,
    ): self {
        $self = clone $this;
        $self['upperBoundTimePoint'] = $upperBoundTimePoint;

        return $self;
    }

    /**
     * Describes the behavior at the lower bound endpoint of the time range.
     */
    public function withLowerBoundEndpointBehavior(
        string $lowerBoundEndpointBehavior
    ): self {
        $self = clone $this;
        $self['lowerBoundEndpointBehavior'] = $lowerBoundEndpointBehavior;

        return $self;
    }

    /**
     * Specifies the parser used for the property in the operation.
     */
    public function withPropertyParser(string $propertyParser): self
    {
        $self = clone $this;
        $self['propertyParser'] = $propertyParser;

        return $self;
    }

    /**
     * Describes the behavior at the upper bound endpoint of the time range.
     */
    public function withUpperBoundEndpointBehavior(
        string $upperBoundEndpointBehavior
    ): self {
        $self = clone $this;
        $self['upperBoundEndpointBehavior'] = $upperBoundEndpointBehavior;

        return $self;
    }
}
