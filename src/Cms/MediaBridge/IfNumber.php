<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Cms\MediaBridge\IfNumber\Operator;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\MapOf;

/**
 * @phpstan-type IfNumberShape = array{
 *   enclosedInParentheses: bool,
 *   ifExpression: array<string,mixed>,
 *   operator: value-of<Operator>,
 *   elseExpression?: array<string,mixed>|null,
 *   inputs?: list<array<string,mixed>>|null,
 *   propertyName?: string|null,
 *   value?: float|null,
 * }
 */
final class IfNumber implements BaseModel
{
    /** @use SdkModel<IfNumberShape> */
    use SdkModel;

    #[Required]
    public bool $enclosedInParentheses;

    /** @var array<string,mixed> $ifExpression */
    #[Required(map: 'mixed')]
    public array $ifExpression;

    /** @var value-of<Operator> $operator */
    #[Required(enum: Operator::class)]
    public string $operator;

    /** @var array<string,mixed>|null $elseExpression */
    #[Optional(map: 'mixed')]
    public ?array $elseExpression;

    /** @var list<array<string,mixed>>|null $inputs */
    #[Optional(list: new MapOf('mixed'))]
    public ?array $inputs;

    #[Optional]
    public ?string $propertyName;

    #[Optional]
    public ?float $value;

    /**
     * `new IfNumber()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IfNumber::with(enclosedInParentheses: ..., ifExpression: ..., operator: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IfNumber)
     *   ->withEnclosedInParentheses(...)
     *   ->withIfExpression(...)
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
     * @param array<string,mixed> $ifExpression
     * @param Operator|value-of<Operator> $operator
     * @param array<string,mixed> $elseExpression
     * @param list<array<string,mixed>> $inputs
     */
    public static function with(
        bool $enclosedInParentheses,
        array $ifExpression,
        Operator|string $operator = 'IF_NUMBER',
        ?array $elseExpression = null,
        ?array $inputs = null,
        ?string $propertyName = null,
        ?float $value = null,
    ): self {
        $self = new self;

        $self['enclosedInParentheses'] = $enclosedInParentheses;
        $self['ifExpression'] = $ifExpression;
        $self['operator'] = $operator;

        null !== $elseExpression && $self['elseExpression'] = $elseExpression;
        null !== $inputs && $self['inputs'] = $inputs;
        null !== $propertyName && $self['propertyName'] = $propertyName;
        null !== $value && $self['value'] = $value;

        return $self;
    }

    public function withEnclosedInParentheses(bool $enclosedInParentheses): self
    {
        $self = clone $this;
        $self['enclosedInParentheses'] = $enclosedInParentheses;

        return $self;
    }

    /**
     * @param array<string,mixed> $ifExpression
     */
    public function withIfExpression(array $ifExpression): self
    {
        $self = clone $this;
        $self['ifExpression'] = $ifExpression;

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

    /**
     * @param array<string,mixed> $elseExpression
     */
    public function withElseExpression(array $elseExpression): self
    {
        $self = clone $this;
        $self['elseExpression'] = $elseExpression;

        return $self;
    }

    /**
     * @param list<array<string,mixed>> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }

    public function withPropertyName(string $propertyName): self
    {
        $self = clone $this;
        $self['propertyName'] = $propertyName;

        return $self;
    }

    public function withValue(float $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
