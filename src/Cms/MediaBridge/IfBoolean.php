<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge;

use HubSpotSDK\Cms\MediaBridge\IfBoolean\Input;
use HubSpotSDK\Cms\MediaBridge\IfBoolean\Operator;
use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type IfBooleanShape = array{
 *   enclosedInParentheses: bool,
 *   ifExpression: mixed,
 *   operator: Operator|value-of<Operator>,
 *   elseExpression?: mixed,
 *   inputs?: list<mixed>|null,
 *   propertyName?: string|null,
 *   value?: bool|null,
 * }
 */
final class IfBoolean implements BaseModel
{
    /** @use SdkModel<IfBooleanShape> */
    use SdkModel;

    #[Required]
    public bool $enclosedInParentheses;

    #[Required]
    public mixed $ifExpression;

    /** @var value-of<Operator> $operator */
    #[Required(enum: Operator::class)]
    public string $operator;

    #[Optional]
    public mixed $elseExpression;

    /** @var list<mixed>|null $inputs */
    #[Optional(list: Input::class)]
    public ?array $inputs;

    #[Optional]
    public ?string $propertyName;

    #[Optional]
    public ?bool $value;

    /**
     * `new IfBoolean()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IfBoolean::with(enclosedInParentheses: ..., ifExpression: ..., operator: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IfBoolean)
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
     * @param Operator|value-of<Operator> $operator
     * @param list<mixed>|null $inputs
     */
    public static function with(
        bool $enclosedInParentheses,
        mixed $ifExpression,
        Operator|string $operator = 'IF_BOOLEAN',
        mixed $elseExpression = null,
        ?array $inputs = null,
        ?string $propertyName = null,
        ?bool $value = null,
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

    public function withIfExpression(mixed $ifExpression): self
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

    public function withElseExpression(mixed $elseExpression): self
    {
        $self = clone $this;
        $self['elseExpression'] = $elseExpression;

        return $self;
    }

    /**
     * @param list<mixed> $inputs
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

    public function withValue(bool $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
