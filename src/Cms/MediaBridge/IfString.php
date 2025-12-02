<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Cms\MediaBridge\IfString\Operator;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type IfStringShape = array{
 *   enclosedInParentheses: bool,
 *   ifExpression: mixed,
 *   operator: value-of<Operator>,
 *   elseExpression?: mixed,
 *   inputs?: list<mixed>|null,
 *   propertyName?: string|null,
 *   value?: string|null,
 * }
 */
final class IfString implements BaseModel
{
    /** @use SdkModel<IfStringShape> */
    use SdkModel;

    #[Api]
    public bool $enclosedInParentheses;

    #[Api]
    public mixed $ifExpression;

    /** @var value-of<Operator> $operator */
    #[Api(enum: Operator::class)]
    public string $operator;

    #[Api(optional: true)]
    public mixed $elseExpression;

    /** @var list<mixed>|null $inputs */
    #[Api(list: 'mixed', optional: true)]
    public ?array $inputs;

    #[Api(optional: true)]
    public ?string $propertyName;

    #[Api(optional: true)]
    public ?string $value;

    /**
     * `new IfString()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IfString::with(enclosedInParentheses: ..., ifExpression: ..., operator: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IfString)
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
     * @param list<mixed> $inputs
     */
    public static function with(
        bool $enclosedInParentheses,
        mixed $ifExpression,
        Operator|string $operator = 'IF_STRING',
        mixed $elseExpression = null,
        ?array $inputs = null,
        ?string $propertyName = null,
        ?string $value = null,
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

    public function withIfExpression(mixed $ifExpression): self
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

    public function withElseExpression(mixed $elseExpression): self
    {
        $obj = clone $this;
        $obj->elseExpression = $elseExpression;

        return $obj;
    }

    /**
     * @param list<mixed> $inputs
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

    public function withValue(string $value): self
    {
        $obj = clone $this;
        $obj->value = $value;

        return $obj;
    }
}
