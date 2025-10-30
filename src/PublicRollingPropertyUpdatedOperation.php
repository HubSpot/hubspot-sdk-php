<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicRollingPropertyUpdatedOperation\OperationType;

/**
 * @phpstan-type PublicRollingPropertyUpdatedOperationShape = array{
 *   includeObjectsWithNoValueSet: bool,
 *   numberOfDays: int,
 *   operationType: value-of<OperationType>,
 *   operator: string,
 * }
 */
final class PublicRollingPropertyUpdatedOperation implements BaseModel
{
    /** @use SdkModel<PublicRollingPropertyUpdatedOperationShape> */
    use SdkModel;

    #[Api]
    public bool $includeObjectsWithNoValueSet;

    #[Api]
    public int $numberOfDays;

    /** @var value-of<OperationType> $operationType */
    #[Api(enum: OperationType::class)]
    public string $operationType;

    #[Api]
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
        $obj = new self;

        $obj->includeObjectsWithNoValueSet = $includeObjectsWithNoValueSet;
        $obj->numberOfDays = $numberOfDays;
        $obj['operationType'] = $operationType;
        $obj->operator = $operator;

        return $obj;
    }

    public function withIncludeObjectsWithNoValueSet(
        bool $includeObjectsWithNoValueSet
    ): self {
        $obj = clone $this;
        $obj->includeObjectsWithNoValueSet = $includeObjectsWithNoValueSet;

        return $obj;
    }

    public function withNumberOfDays(int $numberOfDays): self
    {
        $obj = clone $this;
        $obj->numberOfDays = $numberOfDays;

        return $obj;
    }

    /**
     * @param OperationType|value-of<OperationType> $operationType
     */
    public function withOperationType(OperationType|string $operationType): self
    {
        $obj = clone $this;
        $obj['operationType'] = $operationType;

        return $obj;
    }

    public function withOperator(string $operator): self
    {
        $obj = clone $this;
        $obj->operator = $operator;

        return $obj;
    }
}
