<?php

declare(strict_types=1);

namespace HubspotSDK\CRM;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\Filter\Operator;

/**
 * Defines a single condition for searching CRM objects, specifying the property to filter on, the operator to use (such as equals, greater than, or contains), and the value(s) to compare against.
 *
 * @phpstan-type FilterShape = array{
 *   operator: value-of<Operator>,
 *   propertyName: string,
 *   highValue?: string,
 *   value?: string,
 *   values?: list<string>,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * The comparison operator used in the filter, such as "EQ" or "GT".
     *
     * @var value-of<Operator> $operator
     */
    #[Api(enum: Operator::class)]
    public string $operator;

    /**
     * The name of the property to apply the filter to.
     */
    #[Api]
    public string $propertyName;

    /**
     * The upper boundary value when using ranged-based filters.
     */
    #[Api(optional: true)]
    public ?string $highValue;

    /**
     * The value to match against the property.
     */
    #[Api(optional: true)]
    public ?string $value;

    /**
     * The values to match against the property.
     *
     * @var list<string>|null $values
     */
    #[Api(list: 'string', optional: true)]
    public ?array $values;

    /**
     * `new Filter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Filter::with(operator: ..., propertyName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Filter)->withOperator(...)->withPropertyName(...)
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
     */
    public static function with(
        Operator|string $operator,
        string $propertyName,
        ?string $highValue = null,
        ?string $value = null,
        ?array $values = null,
    ): self {
        $obj = new self;

        $obj['operator'] = $operator;
        $obj->propertyName = $propertyName;

        null !== $highValue && $obj->highValue = $highValue;
        null !== $value && $obj->value = $value;
        null !== $values && $obj->values = $values;

        return $obj;
    }

    /**
     * The comparison operator used in the filter, such as "EQ" or "GT".
     *
     * @param Operator|value-of<Operator> $operator
     */
    public function withOperator(Operator|string $operator): self
    {
        $obj = clone $this;
        $obj['operator'] = $operator;

        return $obj;
    }

    /**
     * The name of the property to apply the filter to.
     */
    public function withPropertyName(string $propertyName): self
    {
        $obj = clone $this;
        $obj->propertyName = $propertyName;

        return $obj;
    }

    /**
     * The upper boundary value when using ranged-based filters.
     */
    public function withHighValue(string $highValue): self
    {
        $obj = clone $this;
        $obj->highValue = $highValue;

        return $obj;
    }

    /**
     * The value to match against the property.
     */
    public function withValue(string $value): self
    {
        $obj = clone $this;
        $obj->value = $value;

        return $obj;
    }

    /**
     * The values to match against the property.
     *
     * @param list<string> $values
     */
    public function withValues(array $values): self
    {
        $obj = clone $this;
        $obj->values = $values;

        return $obj;
    }
}
