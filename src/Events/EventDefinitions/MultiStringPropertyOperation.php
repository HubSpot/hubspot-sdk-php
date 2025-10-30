<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Events\EventDefinitions\MultiStringPropertyOperation\Operator;
use HubspotSDK\Events\EventDefinitions\MultiStringPropertyOperation\PropertyType;

/**
 * @phpstan-type MultiStringPropertyOperationShape = array{
 *   coalescingRefineBy: NumOccurrencesRefineBy|SetOccurrencesRefineBy,
 *   includeObjectsWithNoValueSet: bool,
 *   operationType: string,
 *   operator: value-of<Operator>,
 *   operatorName: string,
 *   propertyType: value-of<PropertyType>,
 *   values: list<string>,
 *   defaultValue?: string,
 *   pruningRefineBy?: RelativeComparativeTimestampRefineBy|RelativeRangedTimestampRefineBy|AbsoluteComparativeTimestampRefineBy|AbsoluteRangedTimestampRefineBy|AllHistoryRefineBy|TimePointOperation|RangedTimeOperation,
 * }
 */
final class MultiStringPropertyOperation implements BaseModel
{
    /** @use SdkModel<MultiStringPropertyOperationShape> */
    use SdkModel;

    #[Api]
    public NumOccurrencesRefineBy|SetOccurrencesRefineBy $coalescingRefineBy;

    #[Api]
    public bool $includeObjectsWithNoValueSet;

    #[Api]
    public string $operationType;

    /** @var value-of<Operator> $operator */
    #[Api(enum: Operator::class)]
    public string $operator;

    #[Api]
    public string $operatorName;

    /** @var value-of<PropertyType> $propertyType */
    #[Api(enum: PropertyType::class)]
    public string $propertyType;

    /** @var list<string> $values */
    #[Api(list: 'string')]
    public array $values;

    #[Api(optional: true)]
    public ?string $defaultValue;

    #[Api(optional: true)]
    public RelativeComparativeTimestampRefineBy|RelativeRangedTimestampRefineBy|AbsoluteComparativeTimestampRefineBy|AbsoluteRangedTimestampRefineBy|AllHistoryRefineBy|TimePointOperation|RangedTimeOperation|null $pruningRefineBy;

    /**
     * `new MultiStringPropertyOperation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MultiStringPropertyOperation::with(
     *   coalescingRefineBy: ...,
     *   includeObjectsWithNoValueSet: ...,
     *   operationType: ...,
     *   operator: ...,
     *   operatorName: ...,
     *   propertyType: ...,
     *   values: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MultiStringPropertyOperation)
     *   ->withCoalescingRefineBy(...)
     *   ->withIncludeObjectsWithNoValueSet(...)
     *   ->withOperationType(...)
     *   ->withOperator(...)
     *   ->withOperatorName(...)
     *   ->withPropertyType(...)
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
     * @param Operator|value-of<Operator> $operator
     * @param list<string> $values
     * @param PropertyType|value-of<PropertyType> $propertyType
     */
    public static function with(
        NumOccurrencesRefineBy|SetOccurrencesRefineBy $coalescingRefineBy,
        bool $includeObjectsWithNoValueSet,
        string $operationType,
        Operator|string $operator,
        string $operatorName,
        array $values,
        PropertyType|string $propertyType = 'multistring',
        ?string $defaultValue = null,
        RelativeComparativeTimestampRefineBy|RelativeRangedTimestampRefineBy|AbsoluteComparativeTimestampRefineBy|AbsoluteRangedTimestampRefineBy|AllHistoryRefineBy|TimePointOperation|RangedTimeOperation|null $pruningRefineBy = null,
    ): self {
        $obj = new self;

        $obj->coalescingRefineBy = $coalescingRefineBy;
        $obj->includeObjectsWithNoValueSet = $includeObjectsWithNoValueSet;
        $obj->operationType = $operationType;
        $obj['operator'] = $operator;
        $obj->operatorName = $operatorName;
        $obj['propertyType'] = $propertyType;
        $obj->values = $values;

        null !== $defaultValue && $obj->defaultValue = $defaultValue;
        null !== $pruningRefineBy && $obj->pruningRefineBy = $pruningRefineBy;

        return $obj;
    }

    public function withCoalescingRefineBy(
        NumOccurrencesRefineBy|SetOccurrencesRefineBy $coalescingRefineBy
    ): self {
        $obj = clone $this;
        $obj->coalescingRefineBy = $coalescingRefineBy;

        return $obj;
    }

    public function withIncludeObjectsWithNoValueSet(
        bool $includeObjectsWithNoValueSet
    ): self {
        $obj = clone $this;
        $obj->includeObjectsWithNoValueSet = $includeObjectsWithNoValueSet;

        return $obj;
    }

    public function withOperationType(string $operationType): self
    {
        $obj = clone $this;
        $obj->operationType = $operationType;

        return $obj;
    }

    /**
     * @param Operator|value-of<Operator> $operator
     */
    public function withOperator(Operator|string $operator): self
    {
        $obj = clone $this;
        $obj['operator'] = $operator;

        return $obj;
    }

    public function withOperatorName(string $operatorName): self
    {
        $obj = clone $this;
        $obj->operatorName = $operatorName;

        return $obj;
    }

    /**
     * @param PropertyType|value-of<PropertyType> $propertyType
     */
    public function withPropertyType(PropertyType|string $propertyType): self
    {
        $obj = clone $this;
        $obj['propertyType'] = $propertyType;

        return $obj;
    }

    /**
     * @param list<string> $values
     */
    public function withValues(array $values): self
    {
        $obj = clone $this;
        $obj->values = $values;

        return $obj;
    }

    public function withDefaultValue(string $defaultValue): self
    {
        $obj = clone $this;
        $obj->defaultValue = $defaultValue;

        return $obj;
    }

    public function withPruningRefineBy(
        RelativeComparativeTimestampRefineBy|RelativeRangedTimestampRefineBy|AbsoluteComparativeTimestampRefineBy|AbsoluteRangedTimestampRefineBy|AllHistoryRefineBy|TimePointOperation|RangedTimeOperation $pruningRefineBy,
    ): self {
        $obj = clone $this;
        $obj->pruningRefineBy = $pruningRefineBy;

        return $obj;
    }
}
