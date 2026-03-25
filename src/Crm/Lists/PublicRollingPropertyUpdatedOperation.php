<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Lists\PublicRollingPropertyUpdatedOperation\OperationType;

/**
 * @phpstan-type PublicRollingPropertyUpdatedOperationShape = array{
 *   includeObjectsWithNoValueSet: bool,
 *   numberOfDays: int,
 *   operationType: OperationType|value-of<OperationType>,
 *   operator: string,
 * }
 */
final class PublicRollingPropertyUpdatedOperation implements BaseModel
{
    /** @use SdkModel<PublicRollingPropertyUpdatedOperationShape> */
    use SdkModel;

    /**
     * Indicates whether objects with no value set for the property should be included in the operation.
     */
    #[Required]
    public bool $includeObjectsWithNoValueSet;

    /**
     * The number of days to be considered in the rolling property updated operation.
     */
    #[Required]
    public int $numberOfDays;

    /**
     * Specifies the type of operation (ROLLING_PROPERTY_UPDATED).
     *
     * @var value-of<OperationType> $operationType
     */
    #[Required(enum: OperationType::class)]
    public string $operationType;

    /**
     * Defines the operation to be applied within the rolling property updated operation (UPDATED_IN_LAST_X_DAYS, NOT_UPDATED_IN_LAST_X_DAYS).
     */
    #[Required]
    public string $operator;

    /**
     * `new PublicRollingPropertyUpdatedOperation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicRollingPropertyUpdatedOperation::with(
     *   includeObjectsWithNoValueSet: ...,
     *   numberOfDays: ...,
     *   operationType: ...,
     *   operator: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicRollingPropertyUpdatedOperation)
     *   ->withIncludeObjectsWithNoValueSet(...)
     *   ->withNumberOfDays(...)
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
        int $numberOfDays,
        string $operator,
        OperationType|string $operationType = 'ROLLING_PROPERTY_UPDATED',
    ): self {
        $self = new self;

        $self['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;
        $self['numberOfDays'] = $numberOfDays;
        $self['operationType'] = $operationType;
        $self['operator'] = $operator;

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
     * The number of days to be considered in the rolling property updated operation.
     */
    public function withNumberOfDays(int $numberOfDays): self
    {
        $self = clone $this;
        $self['numberOfDays'] = $numberOfDays;

        return $self;
    }

    /**
     * Specifies the type of operation (ROLLING_PROPERTY_UPDATED).
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
     * Defines the operation to be applied within the rolling property updated operation (UPDATED_IN_LAST_X_DAYS, NOT_UPDATED_IN_LAST_X_DAYS).
     */
    public function withOperator(string $operator): self
    {
        $self = clone $this;
        $self['operator'] = $operator;

        return $self;
    }
}
