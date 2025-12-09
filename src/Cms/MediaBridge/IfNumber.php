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
        $obj = new self;

        $obj['enclosedInParentheses'] = $enclosedInParentheses;
        $obj['ifExpression'] = $ifExpression;
        $obj['operator'] = $operator;

        null !== $elseExpression && $obj['elseExpression'] = $elseExpression;
        null !== $inputs && $obj['inputs'] = $inputs;
        null !== $propertyName && $obj['propertyName'] = $propertyName;
        null !== $value && $obj['value'] = $value;

        return $obj;
    }

    public function withEnclosedInParentheses(bool $enclosedInParentheses): self
    {
        $obj = clone $this;
        $obj['enclosedInParentheses'] = $enclosedInParentheses;

        return $obj;
    }

    /**
     * @param array<string,mixed> $ifExpression
     */
    public function withIfExpression(array $ifExpression): self
    {
        $obj = clone $this;
        $obj['ifExpression'] = $ifExpression;

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
        $obj['elseExpression'] = $elseExpression;

        return $obj;
    }

    /**
     * @param list<array<string,mixed>> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj['inputs'] = $inputs;

        return $obj;
    }

    public function withPropertyName(string $propertyName): self
    {
        $obj = clone $this;
        $obj['propertyName'] = $propertyName;

        return $obj;
    }

    public function withValue(float $value): self
    {
        $obj = clone $this;
        $obj['value'] = $value;

        return $obj;
    }
}
