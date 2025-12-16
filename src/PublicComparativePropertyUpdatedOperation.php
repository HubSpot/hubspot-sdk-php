<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicComparativePropertyUpdatedOperation\OperationType;

/**
 * @phpstan-type PublicComparativePropertyUpdatedOperationShape = array{
 *   comparisonPropertyName: string,
 *   includeObjectsWithNoValueSet: bool,
 *   operationType: OperationType|value-of<OperationType>,
 *   operator: string,
 *   defaultComparisonValue?: string|null,
 * }
 */
final class PublicComparativePropertyUpdatedOperation implements BaseModel
{
    /** @use SdkModel<PublicComparativePropertyUpdatedOperationShape> */
    use SdkModel;

    #[Required]
    public string $comparisonPropertyName;

    #[Required]
    public bool $includeObjectsWithNoValueSet;

    /** @var value-of<OperationType> $operationType */
    #[Required(enum: OperationType::class)]
    public string $operationType;

    #[Required]
    public string $operator;

    #[Optional]
    public ?string $defaultComparisonValue;

    /**
     * `new PublicComparativePropertyUpdatedOperation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicComparativePropertyUpdatedOperation::with(
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
     * (new PublicComparativePropertyUpdatedOperation)
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
        OperationType|string $operationType = 'COMPARATIVE_PROPERTY_UPDATED',
        ?string $defaultComparisonValue = null,
    ): self {
        $self = new self;

        $self['comparisonPropertyName'] = $comparisonPropertyName;
        $self['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;
        $self['operationType'] = $operationType;
        $self['operator'] = $operator;

        null !== $defaultComparisonValue && $self['defaultComparisonValue'] = $defaultComparisonValue;

        return $self;
    }

    public function withComparisonPropertyName(
        string $comparisonPropertyName
    ): self {
        $self = clone $this;
        $self['comparisonPropertyName'] = $comparisonPropertyName;

        return $self;
    }

    public function withIncludeObjectsWithNoValueSet(
        bool $includeObjectsWithNoValueSet
    ): self {
        $self = clone $this;
        $self['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;

        return $self;
    }

    /**
     * @param OperationType|value-of<OperationType> $operationType
     */
    public function withOperationType(OperationType|string $operationType): self
    {
        $self = clone $this;
        $self['operationType'] = $operationType;

        return $self;
    }

    public function withOperator(string $operator): self
    {
        $self = clone $this;
        $self['operator'] = $operator;

        return $self;
    }

    public function withDefaultComparisonValue(
        string $defaultComparisonValue
    ): self {
        $self = clone $this;
        $self['defaultComparisonValue'] = $defaultComparisonValue;

        return $self;
    }
}
