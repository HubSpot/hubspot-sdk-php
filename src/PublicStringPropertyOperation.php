<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicStringPropertyOperation\OperationType;

/**
 * @phpstan-type PublicStringPropertyOperationShape = array{
 *   includeObjectsWithNoValueSet: bool,
 *   operationType: value-of<OperationType>,
 *   operator: string,
 *   value: string,
 * }
 */
final class PublicStringPropertyOperation implements BaseModel
{
    /** @use SdkModel<PublicStringPropertyOperationShape> */
    use SdkModel;

    #[Api]
    public bool $includeObjectsWithNoValueSet;

    /** @var value-of<OperationType> $operationType */
    #[Api(enum: OperationType::class)]
    public string $operationType;

    #[Api]
    public string $operator;

    #[Api]
    public string $value;

    /**
     * `new PublicStringPropertyOperation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicStringPropertyOperation::with(
     *   includeObjectsWithNoValueSet: ...,
     *   operationType: ...,
     *   operator: ...,
     *   value: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicStringPropertyOperation)
     *   ->withIncludeObjectsWithNoValueSet(...)
     *   ->withOperationType(...)
     *   ->withOperator(...)
     *   ->withValue(...)
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
        string $value,
        OperationType|string $operationType = 'STRING',
    ): self {
        $obj = new self;

        $obj->includeObjectsWithNoValueSet = $includeObjectsWithNoValueSet;
        $obj['operationType'] = $operationType;
        $obj->operator = $operator;
        $obj->value = $value;

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

    public function withValue(string $value): self
    {
        $obj = clone $this;
        $obj->value = $value;

        return $obj;
    }
}
