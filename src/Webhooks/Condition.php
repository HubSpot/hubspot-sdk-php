<?php

declare(strict_types=1);

namespace HubSpotSDK\Webhooks;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Webhooks\Condition\FilterType;
use HubSpotSDK\Webhooks\Condition\Operator;

/**
 * @phpstan-type ConditionShape = array{
 *   filterType: FilterType|value-of<FilterType>,
 *   operator: Operator|value-of<Operator>,
 *   property: string,
 *   value?: string|null,
 *   values?: list<string>|null,
 * }
 */
final class Condition implements BaseModel
{
    /** @use SdkModel<ConditionShape> */
    use SdkModel;

    /**
     * A string representing the type of filter. Valid value is 'CRM_OBJECT_PROPERTY'.
     *
     * @var value-of<FilterType> $filterType
     */
    #[Required(enum: FilterType::class)]
    public string $filterType;

    /**
     * A string indicating the operation to apply for filtering. Valid values include 'EQ', 'N_EQ', 'LT', 'GT', 'LTE', 'GTE', 'CONTAINS', 'STARTS_WITH', 'ENDS_WITH', 'IN', 'NOT_IN', 'IS_EMPTY', and 'IS_NOT_EMPTY'.
     *
     * @var value-of<Operator> $operator
     */
    #[Required(enum: Operator::class)]
    public string $operator;

    /**
     * A string specifying the property of the CRM object to be filtered.
     */
    #[Required]
    public string $property;

    /**
     * A string representing the value to compare against the specified property when filtering.
     */
    #[Optional]
    public ?string $value;

    /**
     * An array of strings, each representing a value to be used in the filtering operation.
     *
     * @var list<string>|null $values
     */
    #[Optional(list: 'string')]
    public ?array $values;

    /**
     * `new Condition()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Condition::with(filterType: ..., operator: ..., property: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Condition)->withFilterType(...)->withOperator(...)->withProperty(...)
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
     * @param FilterType|value-of<FilterType> $filterType
     * @param Operator|value-of<Operator> $operator
     * @param list<string>|null $values
     */
    public static function with(
        FilterType|string $filterType,
        Operator|string $operator,
        string $property,
        ?string $value = null,
        ?array $values = null,
    ): self {
        $self = new self;

        $self['filterType'] = $filterType;
        $self['operator'] = $operator;
        $self['property'] = $property;

        null !== $value && $self['value'] = $value;
        null !== $values && $self['values'] = $values;

        return $self;
    }

    /**
     * A string representing the type of filter. Valid value is 'CRM_OBJECT_PROPERTY'.
     *
     * @param FilterType|value-of<FilterType> $filterType
     */
    public function withFilterType(FilterType|string $filterType): self
    {
        $self = clone $this;
        $self['filterType'] = $filterType;

        return $self;
    }

    /**
     * A string indicating the operation to apply for filtering. Valid values include 'EQ', 'N_EQ', 'LT', 'GT', 'LTE', 'GTE', 'CONTAINS', 'STARTS_WITH', 'ENDS_WITH', 'IN', 'NOT_IN', 'IS_EMPTY', and 'IS_NOT_EMPTY'.
     *
     * @param Operator|value-of<Operator> $operator
     */
    public function withOperator(Operator|string $operator): self
    {
        $self = clone $this;
        $self['operator'] = $operator;

        return $self;
    }

    /**
     * A string specifying the property of the CRM object to be filtered.
     */
    public function withProperty(string $property): self
    {
        $self = clone $this;
        $self['property'] = $property;

        return $self;
    }

    /**
     * A string representing the value to compare against the specified property when filtering.
     */
    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }

    /**
     * An array of strings, each representing a value to be used in the filtering operation.
     *
     * @param list<string> $values
     */
    public function withValues(array $values): self
    {
        $self = clone $this;
        $self['values'] = $values;

        return $self;
    }
}
