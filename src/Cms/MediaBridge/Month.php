<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Cms\MediaBridge\Month\Operator;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\MapOf;

/**
 * @phpstan-type MonthShape = array{
 *   operator: value-of<Operator>,
 *   inputs?: list<array<string,mixed>>|null,
 *   propertyName?: string|null,
 *   value?: float|null,
 * }
 */
final class Month implements BaseModel
{
    /** @use SdkModel<MonthShape> */
    use SdkModel;

    /** @var value-of<Operator> $operator */
    #[Api(enum: Operator::class)]
    public string $operator;

    /** @var list<array<string,mixed>>|null $inputs */
    #[Api(list: new MapOf('mixed'), optional: true)]
    public ?array $inputs;

    #[Api(optional: true)]
    public ?string $propertyName;

    #[Api(optional: true)]
    public ?float $value;

    /**
     * `new Month()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Month::with(operator: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Month)->withOperator(...)
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
        Operator|string $operator = 'MONTH',
        ?array $inputs = null,
        ?string $propertyName = null,
        ?float $value = null,
    ): self {
        $obj = new self;

        $obj['operator'] = $operator;

        null !== $inputs && $obj['inputs'] = $inputs;
        null !== $propertyName && $obj['propertyName'] = $propertyName;
        null !== $value && $obj['value'] = $value;

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
