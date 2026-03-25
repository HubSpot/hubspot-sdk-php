<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Lists\PublicRangedNumberPropertyOperation\OperationType;

/**
 * @phpstan-type PublicRangedNumberPropertyOperationShape = array{
 *   includeObjectsWithNoValueSet: bool,
 *   lowerBound: int,
 *   operationType: OperationType|value-of<OperationType>,
 *   operator: string,
 *   upperBound: int,
 * }
 */
final class PublicRangedNumberPropertyOperation implements BaseModel
{
    /** @use SdkModel<PublicRangedNumberPropertyOperationShape> */
    use SdkModel;

    /**
     * Indicates whether objects with no value set for the property should be included in the operation.
     */
    #[Required]
    public bool $includeObjectsWithNoValueSet;

    /**
     * The lower limit of the number range for the operation.
     */
    #[Required]
    public int $lowerBound;

    /**
     * Specifies the type of operation (NUMBER_RANGED).
     *
     * @var value-of<OperationType> $operationType
     */
    #[Required(enum: OperationType::class)]
    public string $operationType;

    /**
     * Defines the operation to be applied in the ranged number property operation (IS_BETWEEN, IS_NOT_BETWEEN).
     */
    #[Required]
    public string $operator;

    /**
     * The upper limit of the number range for the operation.
     */
    #[Required]
    public int $upperBound;

    /**
     * `new PublicRangedNumberPropertyOperation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicRangedNumberPropertyOperation::with(
     *   includeObjectsWithNoValueSet: ...,
     *   lowerBound: ...,
     *   operationType: ...,
     *   operator: ...,
     *   upperBound: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicRangedNumberPropertyOperation)
     *   ->withIncludeObjectsWithNoValueSet(...)
     *   ->withLowerBound(...)
     *   ->withOperationType(...)
     *   ->withOperator(...)
     *   ->withUpperBound(...)
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
     * @param OperationType|value-of<OperationType> $operationType
     */
    public static function with(
        bool $includeObjectsWithNoValueSet,
        int $lowerBound,
        string $operator,
        int $upperBound,
        OperationType|string $operationType = 'NUMBER_RANGED',
    ): self {
        $self = new self;

        $self['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;
        $self['lowerBound'] = $lowerBound;
        $self['operationType'] = $operationType;
        $self['operator'] = $operator;
        $self['upperBound'] = $upperBound;

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
     * The lower limit of the number range for the operation.
     */
    public function withLowerBound(int $lowerBound): self
    {
        $self = clone $this;
        $self['lowerBound'] = $lowerBound;

        return $self;
    }

    /**
     * Specifies the type of operation (NUMBER_RANGED).
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
     * Defines the operation to be applied in the ranged number property operation (IS_BETWEEN, IS_NOT_BETWEEN).
     */
    public function withOperator(string $operator): self
    {
        $self = clone $this;
        $self['operator'] = $operator;

        return $self;
    }

    /**
     * The upper limit of the number range for the operation.
     */
    public function withUpperBound(int $upperBound): self
    {
        $self = clone $this;
        $self['upperBound'] = $upperBound;

        return $self;
    }
}
