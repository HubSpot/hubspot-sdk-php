<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Cms\MediaBridge\SetContainsString\Operator;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\MapOf;

/**
 * @phpstan-type SetContainsStringShape = array{
 *   operator: value-of<Operator>,
 *   stringToCheck: array<string,mixed>,
 *   inputs?: list<array<string,mixed>>|null,
 *   propertyName?: string|null,
 *   value?: bool|null,
 * }
 */
final class SetContainsString implements BaseModel
{
    /** @use SdkModel<SetContainsStringShape> */
    use SdkModel;

    /** @var value-of<Operator> $operator */
    #[Api(enum: Operator::class)]
    public string $operator;

    /** @var array<string,mixed> $stringToCheck */
    #[Api(map: 'mixed')]
    public array $stringToCheck;

    /** @var list<array<string,mixed>>|null $inputs */
    #[Api(list: new MapOf('mixed'), optional: true)]
    public ?array $inputs;

    #[Api(optional: true)]
    public ?string $propertyName;

    #[Api(optional: true)]
    public ?bool $value;

    /**
     * `new SetContainsString()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SetContainsString::with(operator: ..., stringToCheck: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SetContainsString)->withOperator(...)->withStringToCheck(...)
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
     * @param array<string,mixed> $stringToCheck
     * @param Operator|value-of<Operator> $operator
     * @param list<array<string,mixed>> $inputs
     */
    public static function with(
        array $stringToCheck,
        Operator|string $operator = 'SET_CONTAINS_STRING',
        ?array $inputs = null,
        ?string $propertyName = null,
        ?bool $value = null,
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

    /**
     * @param array<string,mixed> $stringToCheck
     */
    public function withStringToCheck(array $stringToCheck): self
    {
        $obj = clone $this;
        $obj->stringToCheck = $stringToCheck;

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
