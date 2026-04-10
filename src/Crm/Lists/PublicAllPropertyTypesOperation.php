<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Lists\PublicAllPropertyTypesOperation\OperationType;

/**
 * @phpstan-type PublicAllPropertyTypesOperationShape = array{
 *   includeObjectsWithNoValueSet: bool,
 *   operationType: OperationType|value-of<OperationType>,
 *   operator: string,
 * }
 */
final class PublicAllPropertyTypesOperation implements BaseModel
{
    /** @use SdkModel<PublicAllPropertyTypesOperationShape> */
    use SdkModel;

    /**
     * Indication of whether objects with no value should be included.
     */
    #[Required]
    public bool $includeObjectsWithNoValueSet;

    /**
     * Type of operation (ALL_PROPERTY).
     *
     * @var value-of<OperationType> $operationType
     */
    #[Required(enum: OperationType::class)]
    public string $operationType;

    /**
     * Operator to be applied (IS_KNOWN, IS_UNKNOWN).
     */
    #[Required]
    public string $operator;

    /**
     * `new PublicAllPropertyTypesOperation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicAllPropertyTypesOperation::with(
     *   includeObjectsWithNoValueSet: ..., operationType: ..., operator: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicAllPropertyTypesOperation)
     *   ->withIncludeObjectsWithNoValueSet(...)
     *   ->withOperationType(...)
     *   ->withOperator(...)
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
        string $operator,
        OperationType|string $operationType = 'ALL_PROPERTY',
    ): self {
        $self = new self;

        $self['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;
        $self['operationType'] = $operationType;
        $self['operator'] = $operator;

        return $self;
    }

    /**
     * Indication of whether objects with no value should be included.
     */
    public function withIncludeObjectsWithNoValueSet(
        bool $includeObjectsWithNoValueSet
    ): self {
        $self = clone $this;
        $self['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;

        return $self;
    }

    /**
     * Type of operation (ALL_PROPERTY).
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
     * Operator to be applied (IS_KNOWN, IS_UNKNOWN).
     */
    public function withOperator(string $operator): self
    {
        $self = clone $this;
        $self['operator'] = $operator;

        return $self;
    }
}
