<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Forms\DependentFieldFilter\Operator;

/**
 * A condition based on customer input.
 *
 * @phpstan-type DependentFieldFilterShape = array{
 *   operator: value-of<Operator>,
 *   rangeEnd: string,
 *   rangeStart: string,
 *   value: string,
 *   values: list<string>,
 * }
 */
final class DependentFieldFilter implements BaseModel
{
    /** @use SdkModel<DependentFieldFilterShape> */
    use SdkModel;

    /** @var value-of<Operator> $operator */
    #[Required(enum: Operator::class)]
    public string $operator;

    #[Required]
    public string $rangeEnd;

    #[Required]
    public string $rangeStart;

    #[Required]
    public string $value;

    /** @var list<string> $values */
    #[Required(list: 'string')]
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
        $self = new self;

        $self['operator'] = $operator;
        $self['rangeEnd'] = $rangeEnd;
        $self['rangeStart'] = $rangeStart;
        $self['value'] = $value;
        $self['values'] = $values;

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

    public function withRangeEnd(string $rangeEnd): self
    {
        $self = clone $this;
        $self['rangeEnd'] = $rangeEnd;

        return $self;
    }

    public function withRangeStart(string $rangeStart): self
    {
        $self = clone $this;
        $self['rangeStart'] = $rangeStart;

        return $self;
    }

    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

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
}
