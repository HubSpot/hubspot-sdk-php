<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Cms\MediaBridge\Substring\Operator;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type SubstringShape = array{
 *   operator: value-of<Operator>,
 *   stringToCheck: Expression,
 *   inputs?: list<mixed>|null,
 *   propertyName?: string|null,
 *   value?: string|null,
 * }
 */
final class Substring implements BaseModel
{
    /** @use SdkModel<SubstringShape> */
    use SdkModel;

    /** @var value-of<Operator> $operator */
    #[Api(enum: Operator::class)]
    public string $operator;

    #[Api]
    public Expression $stringToCheck;

    /** @var list<mixed>|null $inputs */
    #[Api(list: Expression::class, optional: true)]
    public ?array $inputs;

    #[Api(optional: true)]
    public ?string $propertyName;

    #[Api(optional: true)]
    public ?string $value;

    /**
     * `new Substring()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Substring::with(operator: ..., stringToCheck: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Substring)->withOperator(...)->withStringToCheck(...)
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
        Expression $stringToCheck,
        Operator|string $operator = 'SUBSTRING',
        ?array $inputs = null,
        ?string $propertyName = null,
        ?string $value = null,
    ): self {
        $obj = new self;

        $obj['operator'] = $operator;
        $obj->stringToCheck = $stringToCheck;

        null !== $inputs && $obj->inputs = $inputs;
        null !== $propertyName && $obj->propertyName = $propertyName;
        null !== $value && $obj->value = $value;

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

    public function withStringToCheck(Expression $stringToCheck): self
    {
        $obj = clone $this;
        $obj->stringToCheck = $stringToCheck;

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
