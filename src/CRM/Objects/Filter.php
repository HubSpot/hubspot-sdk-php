<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\Objects\Filter\Operator;

/**
 * @phpstan-type filter_alias = array{
 *   operator: value-of<Operator>,
 *   propertyName: string,
 *   highValue?: string,
 *   value?: string,
 *   values?: list<string>,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    /** @var value-of<Operator> $operator */
    #[Api(enum: Operator::class)]
    public string $operator;

    #[Api]
    public string $propertyName;

    #[Api(optional: true)]
    public ?string $highValue;

    #[Api(optional: true)]
    public ?string $value;

    /** @var list<string>|null $values */
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
     * @param Operator|value-of<Operator> $operator
     */
    public function withOperator(Operator|string $operator): self
    {
        $obj = clone $this;
        $obj['operator'] = $operator;

        return $obj;
    }

    public function withPropertyName(string $propertyName): self
    {
        $obj = clone $this;
        $obj->propertyName = $propertyName;

        return $obj;
    }

    public function withHighValue(string $highValue): self
    {
        $obj = clone $this;
        $obj->highValue = $highValue;

        return $obj;
    }

    public function withValue(string $value): self
    {
        $obj = clone $this;
        $obj->value = $value;

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
}
