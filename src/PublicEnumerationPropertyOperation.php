<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicEnumerationPropertyOperation\OperationType;

/**
 * @phpstan-type PublicEnumerationPropertyOperationShape = array{
 *   includeObjectsWithNoValueSet: bool,
 *   operationType: value-of<OperationType>,
 *   operator: string,
 *   values: list<string>,
 * }
 */
final class PublicEnumerationPropertyOperation implements BaseModel
{
    /** @use SdkModel<PublicEnumerationPropertyOperationShape> */
    use SdkModel;

    #[Api]
    public bool $includeObjectsWithNoValueSet;

    /** @var value-of<OperationType> $operationType */
    #[Api(enum: OperationType::class)]
    public string $operationType;

    #[Api]
    public string $operator;

    /** @var list<string> $values */
    #[Api(list: 'string')]
    public array $values;

    /**
     * `new PublicEnumerationPropertyOperation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicEnumerationPropertyOperation::with(
     *   includeObjectsWithNoValueSet: ...,
     *   operationType: ...,
     *   operator: ...,
     *   values: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicEnumerationPropertyOperation)
     *   ->withIncludeObjectsWithNoValueSet(...)
     *   ->withOperationType(...)
     *   ->withOperator(...)
     *   ->withValues(...)
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
     * @param list<string> $values
     * @param OperationType|value-of<OperationType> $operationType
     */
    public static function with(
        bool $includeObjectsWithNoValueSet,
        string $operator,
        array $values,
        OperationType|string $operationType = 'ENUMERATION',
    ): self {
        $obj = new self;

        $obj['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;
        $obj['operationType'] = $operationType;
        $obj['operator'] = $operator;
        $obj['values'] = $values;

        return $obj;
    }

    public function withIncludeObjectsWithNoValueSet(
        bool $includeObjectsWithNoValueSet
    ): self {
        $obj = clone $this;
        $obj['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;

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
        $obj['operator'] = $operator;

        return $obj;
    }

    /**
     * @param list<string> $values
     */
    public function withValues(array $values): self
    {
        $obj = clone $this;
        $obj['values'] = $values;

        return $obj;
    }
}
