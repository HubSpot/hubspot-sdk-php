<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Cms\MediaBridge\AddNumbers\Operator;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\MapOf;

/**
 * @phpstan-type AddNumbersShape = array{
 *   enclosedInParentheses: bool,
 *   operator: value-of<Operator>,
 *   inputs?: list<array<string,mixed>>|null,
 *   propertyName?: string|null,
 *   value?: float|null,
 * }
 */
final class AddNumbers implements BaseModel
{
    /** @use SdkModel<AddNumbersShape> */
    use SdkModel;

    #[Required]
    public bool $enclosedInParentheses;

    /** @var value-of<Operator> $operator */
    #[Required(enum: Operator::class)]
    public string $operator;

    /** @var list<array<string,mixed>>|null $inputs */
    #[Optional(list: new MapOf('mixed'))]
    public ?array $inputs;

    #[Optional]
    public ?string $propertyName;

    #[Optional]
    public ?float $value;

    /**
     * `new AddNumbers()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AddNumbers::with(enclosedInParentheses: ..., operator: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AddNumbers)->withEnclosedInParentheses(...)->withOperator(...)
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
     * @param list<array<string,mixed>> $inputs
     */
    public static function with(
        bool $enclosedInParentheses,
        Operator|string $operator = 'ADD_NUMBERS',
        ?array $inputs = null,
        ?string $propertyName = null,
        ?float $value = null,
    ): self {
        $obj = new self;

        $obj['enclosedInParentheses'] = $enclosedInParentheses;
        $obj['operator'] = $operator;

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
     * @param Operator|value-of<Operator> $operator
     */
    public function withOperator(Operator|string $operator): self
    {
        $obj = clone $this;
        $obj['operator'] = $operator;

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
