<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\CrmFilter\Operator;

/**
 * Defines a single condition for searching CRM objects, specifying the property to filter on, the operator to use (such as equals, greater than, or contains), and the value(s) to compare against.
 *
 * @phpstan-type CrmFilterShape = array{
 *   operator: Operator|value-of<Operator>,
 *   propertyName: string,
 *   highValue?: string|null,
 *   value?: string|null,
 *   values?: list<string>|null,
 * }
 */
final class CrmFilter implements BaseModel
{
    /** @use SdkModel<CrmFilterShape> */
    use SdkModel;

    /**
     * The comparison operator used in the filter, such as "EQ" or "GT".
     *
     * @var value-of<Operator> $operator
     */
    #[Required(enum: Operator::class)]
    public string $operator;

    /**
     * The name of the property to apply the filter to.
     */
    #[Required]
    public string $propertyName;

    /**
     * The upper boundary value when using ranged-based filters.
     */
    #[Optional]
    public ?string $highValue;

    /**
     * The value to match against the property.
     */
    #[Optional]
    public ?string $value;

    /**
     * The values to match against the property.
     *
     * @var list<string>|null $values
     */
    #[Optional(list: 'string')]
    public ?array $values;

    /**
     * `new CrmFilter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CrmFilter::with(operator: ..., propertyName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CrmFilter)->withOperator(...)->withPropertyName(...)
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
     * @param list<string>|null $values
     */
    public static function with(
        Operator|string $operator,
        string $propertyName,
        ?string $highValue = null,
        ?string $value = null,
        ?array $values = null,
    ): self {
        $self = new self;

        $self['operator'] = $operator;
        $self['propertyName'] = $propertyName;

        null !== $highValue && $self['highValue'] = $highValue;
        null !== $value && $self['value'] = $value;
        null !== $values && $self['values'] = $values;

        return $self;
    }

    /**
     * The comparison operator used in the filter, such as "EQ" or "GT".
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
     * The name of the property to apply the filter to.
     */
    public function withPropertyName(string $propertyName): self
    {
        $self = clone $this;
        $self['propertyName'] = $propertyName;

        return $self;
    }

    /**
     * The upper boundary value when using ranged-based filters.
     */
    public function withHighValue(string $highValue): self
    {
        $self = clone $this;
        $self['highValue'] = $highValue;

        return $self;
    }

    /**
     * The value to match against the property.
     */
    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }

    /**
     * The values to match against the property.
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
