<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Cms\MediaBridge\IfBoolean\Operator;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\MapOf;

/**
 * @phpstan-type IfBooleanShape = array{
 *   enclosedInParentheses: bool,
 *   ifExpression: array<string,mixed>,
 *   operator: value-of<Operator>,
 *   elseExpression?: array<string,mixed>|null,
 *   inputs?: list<array<string,mixed>>|null,
 *   propertyName?: string|null,
 *   value?: bool|null,
 * }
 */
final class IfBoolean implements BaseModel
{
    /** @use SdkModel<IfBooleanShape> */
    use SdkModel;

    #[Api]
    public bool $enclosedInParentheses;

    /** @var array<string,mixed> $ifExpression */
    #[Api(map: 'mixed')]
    public array $ifExpression;

    /** @var value-of<Operator> $operator */
    #[Api(enum: Operator::class)]
    public string $operator;

    /** @var array<string,mixed>|null $elseExpression */
    #[Api(map: 'mixed', optional: true)]
    public ?array $elseExpression;

    /** @var list<array<string,mixed>>|null $inputs */
    #[Api(list: new MapOf('mixed'), optional: true)]
    public ?array $inputs;

    #[Api(optional: true)]
    public ?string $propertyName;

    #[Api(optional: true)]
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
     * @param array<string,mixed> $ifExpression
     * @param Operator|value-of<Operator> $operator
     * @param array<string,mixed> $elseExpression
     * @param list<array<string,mixed>> $inputs
     */
    public static function with(
        bool $enclosedInParentheses,
        array $ifExpression,
        Operator|string $operator = 'IF_BOOLEAN',
        ?array $elseExpression = null,
        ?array $inputs = null,
        ?string $propertyName = null,
        ?bool $value = null,
    ): self {
        $obj = new self;

        $obj->enclosedInParentheses = $enclosedInParentheses;
        $obj->ifExpression = $ifExpression;
        $obj['operator'] = $operator;

        null !== $elseExpression && $obj->elseExpression = $elseExpression;
        null !== $inputs && $obj->inputs = $inputs;
        null !== $propertyName && $obj->propertyName = $propertyName;
        null !== $value && $obj->value = $value;

        return $obj;
    }

    public function withEnclosedInParentheses(bool $enclosedInParentheses): self
    {
        $obj = clone $this;
        $obj->enclosedInParentheses = $enclosedInParentheses;

        return $obj;
    }

    /**
     * @param array<string,mixed> $ifExpression
     */
    public function withIfExpression(array $ifExpression): self
    {
        $obj = clone $this;
        $obj->ifExpression = $ifExpression;

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

    /**
     * @param array<string,mixed> $elseExpression
     */
    public function withElseExpression(array $elseExpression): self
    {
        $obj = clone $this;
        $obj->elseExpression = $elseExpression;

        return $obj;
    }

    /**
     * @param list<array<string,mixed>> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }

    public function withPropertyName(string $propertyName): self
    {
        $obj = clone $this;
        $obj->propertyName = $propertyName;

        return $obj;
    }

    public function withValue(bool $value): self
    {
        $obj = clone $this;
        $obj->value = $value;

        return $obj;
    }
}
