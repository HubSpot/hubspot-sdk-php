<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Lists\PublicTimePointOperation\OperationType;
use HubSpotSDK\Crm\Lists\PublicTimePointOperation\TimePoint;

/**
 * @phpstan-import-type TimePointVariants from \HubSpotSDK\Crm\Lists\PublicTimePointOperation\TimePoint
 * @phpstan-import-type TimePointShape from \HubSpotSDK\Crm\Lists\PublicTimePointOperation\TimePoint
 *
 * @phpstan-type PublicTimePointOperationShape = array{
 *   includeObjectsWithNoValueSet: bool,
 *   operationType: OperationType|value-of<OperationType>,
 *   operator: string,
 *   timePoint: TimePointShape,
 *   type: string,
 *   endpointBehavior?: string|null,
 *   propertyParser?: string|null,
 * }
 */
final class PublicTimePointOperation implements BaseModel
{
    /** @use SdkModel<PublicTimePointOperationShape> */
    use SdkModel;

    /**
     * Indicates whether objects with no value set for the property should be included in the operation.
     */
    #[Required]
    public bool $includeObjectsWithNoValueSet;

    /**
     * Specifies the type of operation (TIME_POINT).
     *
     * @var value-of<OperationType> $operationType
     */
    #[Required(enum: OperationType::class)]
    public string $operationType;

    /**
     * Specifies the operation to be applied within the time point operation (IS_BEFORE, IS_AFTER).
     */
    #[Required]
    public string $operator;

    /**
     * Defines the specific point in time for the operation, which can be a date, indexed time, or property-referenced time.
     *
     * @var TimePointVariants $timePoint
     */
    #[Required(union: TimePoint::class)]
    public PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime $timePoint;

    /**
     * Defines the type of operation being performed.
     */
    #[Required]
    public string $type;

    /**
     * Describes the behavior at the endpoint of the time point operation.
     */
    #[Optional]
    public ?string $endpointBehavior;

    /**
     * Specifies the parser used for interpreting the property in the operation.
     */
    #[Optional]
    public ?string $propertyParser;

    /**
     * `new PublicTimePointOperation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicTimePointOperation::with(
     *   includeObjectsWithNoValueSet: ...,
     *   operationType: ...,
     *   operator: ...,
     *   timePoint: ...,
     *   type: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicTimePointOperation)
     *   ->withIncludeObjectsWithNoValueSet(...)
     *   ->withOperationType(...)
     *   ->withOperator(...)
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
     * @param TimePointShape $timePoint
     * @param OperationType|value-of<OperationType> $operationType
     */
    public static function with(
        bool $includeObjectsWithNoValueSet,
        string $operator,
        PublicDatePoint|array|PublicIndexedTimePoint|PublicPropertyReferencedTime $timePoint,
        string $type,
        OperationType|string $operationType = 'TIME_POINT',
        ?string $endpointBehavior = null,
        ?string $propertyParser = null,
    ): self {
        $self = new self;

        $self['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;
        $self['operationType'] = $operationType;
        $self['operator'] = $operator;
        $self['timePoint'] = $timePoint;
        $self['type'] = $type;

        null !== $endpointBehavior && $self['endpointBehavior'] = $endpointBehavior;
        null !== $propertyParser && $self['propertyParser'] = $propertyParser;

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
     * Specifies the type of operation (TIME_POINT).
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
     * Specifies the operation to be applied within the time point operation (IS_BEFORE, IS_AFTER).
     */
    public function withOperator(string $operator): self
    {
        $self = clone $this;
        $self['operator'] = $operator;

        return $self;
    }

    /**
     * Defines the specific point in time for the operation, which can be a date, indexed time, or property-referenced time.
     *
     * @param TimePointShape $timePoint
     */
    public function withTimePoint(
        PublicDatePoint|array|PublicIndexedTimePoint|PublicPropertyReferencedTime $timePoint,
    ): self {
        $self = clone $this;
        $self['timePoint'] = $timePoint;

        return $self;
    }

    /**
     * Defines the type of operation being performed.
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Describes the behavior at the endpoint of the time point operation.
     */
    public function withEndpointBehavior(string $endpointBehavior): self
    {
        $self = clone $this;
        $self['endpointBehavior'] = $endpointBehavior;

        return $self;
    }

    /**
     * Specifies the parser used for interpreting the property in the operation.
     */
    public function withPropertyParser(string $propertyParser): self
    {
        $self = clone $this;
        $self['propertyParser'] = $propertyParser;

        return $self;
    }
}
