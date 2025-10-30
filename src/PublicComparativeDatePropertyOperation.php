<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicComparativeDatePropertyOperation\OperationType;

/**
 * @phpstan-type PublicComparativeDatePropertyOperationShape = array{
 *   comparisonPropertyName: string,
 *   includeObjectsWithNoValueSet: bool,
 *   operationType: value-of<OperationType>,
 *   operator: string,
 *   defaultComparisonValue?: string,
 * }
 */
final class PublicComparativeDatePropertyOperation implements BaseModel
{
    /** @use SdkModel<PublicComparativeDatePropertyOperationShape> */
    use SdkModel;

    #[Api]
    public string $comparisonPropertyName;

    #[Api]
    public bool $includeObjectsWithNoValueSet;

    /** @var value-of<OperationType> $operationType */
    #[Api(enum: OperationType::class)]
    public string $operationType;

    #[Api]
    public string $operator;

    #[Api(optional: true)]
    public ?string $defaultComparisonValue;

    /**
     * `new PublicComparativeDatePropertyOperation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicComparativeDatePropertyOperation::with(
     *   comparisonPropertyName: ...,
     *   includeObjectsWithNoValueSet: ...,
     *   operationType: ...,
     *   operator: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicComparativeDatePropertyOperation)
     *   ->withComparisonPropertyName(...)
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
        string $comparisonPropertyName,
        bool $includeObjectsWithNoValueSet,
        string $operator,
        OperationType|string $operationType = 'COMPARATIVE_DATE',
        ?string $defaultComparisonValue = null,
    ): self {
        $obj = new self;

        $obj->comparisonPropertyName = $comparisonPropertyName;
        $obj->includeObjectsWithNoValueSet = $includeObjectsWithNoValueSet;
        $obj['operationType'] = $operationType;
        $obj->operator = $operator;

        null !== $defaultComparisonValue && $obj->defaultComparisonValue = $defaultComparisonValue;

        return $obj;
    }

    public function withComparisonPropertyName(
        string $comparisonPropertyName
    ): self {
        $obj = clone $this;
        $obj->comparisonPropertyName = $comparisonPropertyName;

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

    public function withDefaultComparisonValue(
        string $defaultComparisonValue
    ): self {
        $obj = clone $this;
        $obj->defaultComparisonValue = $defaultComparisonValue;

        return $obj;
    }
}
