<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Forms\DependentFieldFilter\Operator;

/**
 * A condition based on customer input.
 *
 * @phpstan-type dependent_field_filter = array{
 *   operator: value-of<Operator>,
 *   rangeEnd: string,
 *   rangeStart: string,
 *   value: string,
 *   values: list<string>,
 * }
 */
final class DependentFieldFilter implements BaseModel
{
    /** @use SdkModel<dependent_field_filter> */
    use SdkModel;

    /** @var value-of<Operator> $operator */
    #[Api(enum: Operator::class)]
    public string $operator;

    #[Api]
    public string $rangeEnd;

    #[Api]
    public string $rangeStart;

    #[Api]
    public string $value;

    /** @var list<string> $values */
    #[Api(list: 'string')]
    public array $values;

    /**
     * `new DependentFieldFilter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DependentFieldFilter::with(
     *   operator: ..., rangeEnd: ..., rangeStart: ..., value: ..., values: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DependentFieldFilter)
     *   ->withOperator(...)
     *   ->withRangeEnd(...)
     *   ->withRangeStart(...)
     *   ->withValue(...)
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
     */
    public static function with(
        Operator|string $operator,
        string $rangeEnd,
        string $rangeStart,
        string $value,
        array $values,
    ): self {
        $obj = new self;

        $obj['operator'] = $operator;
        $obj->rangeEnd = $rangeEnd;
        $obj->rangeStart = $rangeStart;
        $obj->value = $value;
        $obj->values = $values;

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

    public function withRangeEnd(string $rangeEnd): self
    {
        $obj = clone $this;
        $obj->rangeEnd = $rangeEnd;

        return $obj;
    }

    public function withRangeStart(string $rangeStart): self
    {
        $obj = clone $this;
        $obj->rangeStart = $rangeStart;

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
