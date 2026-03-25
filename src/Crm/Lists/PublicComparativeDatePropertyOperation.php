<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Lists\PublicComparativeDatePropertyOperation\OperationType;

/**
 * @phpstan-type PublicComparativeDatePropertyOperationShape = array{
 *   comparisonPropertyName: string,
 *   includeObjectsWithNoValueSet: bool,
 *   operationType: OperationType|value-of<OperationType>,
 *   operator: string,
 *   defaultComparisonValue?: string|null,
 * }
 */
final class PublicComparativeDatePropertyOperation implements BaseModel
{
    /** @use SdkModel<PublicComparativeDatePropertyOperationShape> */
    use SdkModel;

    /**
     * The name of the property to compare against in the operation.
     */
    #[Required]
    public string $comparisonPropertyName;

    /**
     * Indicates whether objects with no value set for the property should be included in the operation.
     */
    #[Required]
    public bool $includeObjectsWithNoValueSet;

    /**
     * The type of operation (COMPARATIVE_DATE).
     *
     * @var value-of<OperationType> $operationType
     */
    #[Required(enum: OperationType::class)]
    public string $operationType;

    /**
     * Defines the operation to be applied in the comparative date property operation (IS_BEFORE, IS_AFTER).
     */
    #[Required]
    public string $operator;

    /**
     * The default value used for comparison if the actual comparison property value is not set.
     */
    #[Optional]
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
        $self = new self;

        $self['comparisonPropertyName'] = $comparisonPropertyName;
        $self['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;
        $self['operationType'] = $operationType;
        $self['operator'] = $operator;

        null !== $defaultComparisonValue && $self['defaultComparisonValue'] = $defaultComparisonValue;

        return $self;
    }

    /**
     * The name of the property to compare against in the operation.
     */
    public function withComparisonPropertyName(
        string $comparisonPropertyName
    ): self {
        $self = clone $this;
        $self['comparisonPropertyName'] = $comparisonPropertyName;

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
     * The type of operation (COMPARATIVE_DATE).
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
     * Defines the operation to be applied in the comparative date property operation (IS_BEFORE, IS_AFTER).
     */
    public function withOperator(string $operator): self
    {
        $self = clone $this;
        $self['operator'] = $operator;

        return $self;
    }

    /**
     * The default value used for comparison if the actual comparison property value is not set.
     */
    public function withDefaultComparisonValue(
        string $defaultComparisonValue
    ): self {
        $self = clone $this;
        $self['defaultComparisonValue'] = $defaultComparisonValue;

        return $self;
    }
}
