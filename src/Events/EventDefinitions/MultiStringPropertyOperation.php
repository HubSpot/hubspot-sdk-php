<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Events\EventDefinitions\MultiStringPropertyOperation\Operator;
use HubspotSDK\Events\EventDefinitions\MultiStringPropertyOperation\PropertyType;

/**
 * @phpstan-import-type CoalescingRefineByShape from \HubspotSDK\Events\EventDefinitions\MultiStringPropertyOperation\CoalescingRefineBy
 * @phpstan-import-type PruningRefineByShape from \HubspotSDK\Events\EventDefinitions\MultiStringPropertyOperation\PruningRefineBy
 *
 * @phpstan-type MultiStringPropertyOperationShape = array{
 *   coalescingRefineBy: NumOccurrencesRefineBy|SetOccurrencesRefineBy|CoalescingRefineByShape,
 *   includeObjectsWithNoValueSet: bool,
 *   operationType: string,
 *   operator: Operator|value-of<Operator>,
 *   operatorName: string,
 *   propertyType: PropertyType|value-of<PropertyType>,
 *   values: list<string>,
 *   defaultValue?: string|null,
 *   pruningRefineBy?: null|PruningRefineByShape|RelativeComparativeTimestampRefineBy|RelativeRangedTimestampRefineBy|AbsoluteComparativeTimestampRefineBy|AbsoluteRangedTimestampRefineBy|AllHistoryRefineBy|TimePointOperation|RangedTimeOperation,
 * }
 */
final class MultiStringPropertyOperation implements BaseModel
{
    /** @use SdkModel<MultiStringPropertyOperationShape> */
    use SdkModel;

    #[Required]
    public NumOccurrencesRefineBy|SetOccurrencesRefineBy $coalescingRefineBy;

    #[Required]
    public bool $includeObjectsWithNoValueSet;

    #[Required]
    public string $operationType;

    /** @var value-of<Operator> $operator */
    #[Required(enum: Operator::class)]
    public string $operator;

    #[Required]
    public string $operatorName;

    /** @var value-of<PropertyType> $propertyType */
    #[Required(enum: PropertyType::class)]
    public string $propertyType;

    /** @var list<string> $values */
    #[Required(list: 'string')]
    public array $values;

    #[Optional]
    public ?string $defaultValue;

    #[Optional]
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
     * @param CoalescingRefineByShape $coalescingRefineBy
     * @param Operator|value-of<Operator> $operator
     * @param list<string> $values
     * @param PropertyType|value-of<PropertyType> $propertyType
     * @param PruningRefineByShape $pruningRefineBy
     */
    public static function with(
        NumOccurrencesRefineBy|array|SetOccurrencesRefineBy $coalescingRefineBy,
        bool $includeObjectsWithNoValueSet,
        string $operationType,
        Operator|string $operator,
        string $operatorName,
        array $values,
        PropertyType|string $propertyType = 'multistring',
        ?string $defaultValue = null,
        RelativeComparativeTimestampRefineBy|array|RelativeRangedTimestampRefineBy|AbsoluteComparativeTimestampRefineBy|AbsoluteRangedTimestampRefineBy|AllHistoryRefineBy|TimePointOperation|RangedTimeOperation|null $pruningRefineBy = null,
    ): self {
        $self = new self;

        $self['coalescingRefineBy'] = $coalescingRefineBy;
        $self['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;
        $self['operationType'] = $operationType;
        $self['operator'] = $operator;
        $self['operatorName'] = $operatorName;
        $self['propertyType'] = $propertyType;
        $self['values'] = $values;

        null !== $defaultValue && $self['defaultValue'] = $defaultValue;
        null !== $pruningRefineBy && $self['pruningRefineBy'] = $pruningRefineBy;

        return $self;
    }

    /**
     * @param CoalescingRefineByShape $coalescingRefineBy
     */
    public function withCoalescingRefineBy(
        NumOccurrencesRefineBy|array|SetOccurrencesRefineBy $coalescingRefineBy
    ): self {
        $self = clone $this;
        $self['coalescingRefineBy'] = $coalescingRefineBy;

        return $self;
    }

    public function withIncludeObjectsWithNoValueSet(
        bool $includeObjectsWithNoValueSet
    ): self {
        $self = clone $this;
        $self['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;

        return $self;
    }

    public function withOperationType(string $operationType): self
    {
        $self = clone $this;
        $self['operationType'] = $operationType;

        return $self;
    }

    /**
     * @param Operator|value-of<Operator> $operator
     */
    public function withOperator(Operator|string $operator): self
    {
        $self = clone $this;
        $self['operator'] = $operator;

        return $self;
    }

    public function withOperatorName(string $operatorName): self
    {
        $self = clone $this;
        $self['operatorName'] = $operatorName;

        return $self;
    }

    /**
     * @param PropertyType|value-of<PropertyType> $propertyType
     */
    public function withPropertyType(PropertyType|string $propertyType): self
    {
        $self = clone $this;
        $self['propertyType'] = $propertyType;

        return $self;
    }

    /**
     * @param list<string> $values
     */
    public function withValues(array $values): self
    {
        $self = clone $this;
        $self['values'] = $values;

        return $self;
    }

    public function withDefaultValue(string $defaultValue): self
    {
        $self = clone $this;
        $self['defaultValue'] = $defaultValue;

        return $self;
    }

    /**
     * @param PruningRefineByShape $pruningRefineBy
     */
    public function withPruningRefineBy(
        RelativeComparativeTimestampRefineBy|array|RelativeRangedTimestampRefineBy|AbsoluteComparativeTimestampRefineBy|AbsoluteRangedTimestampRefineBy|AllHistoryRefineBy|TimePointOperation|RangedTimeOperation $pruningRefineBy,
    ): self {
        $self = clone $this;
        $self['pruningRefineBy'] = $pruningRefineBy;

        return $self;
    }
}
