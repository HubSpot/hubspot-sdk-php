<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge;

use HubSpotSDK\Cms\MediaBridge\NumberPropertyVariable\Operator;
use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type NumberPropertyVariableShape = array{
 *   operator: Operator|value-of<Operator>,
 *   propertyName?: string|null,
 *   value?: float|null,
 * }
 */
final class NumberPropertyVariable implements BaseModel
{
    /** @use SdkModel<NumberPropertyVariableShape> */
    use SdkModel;

    /** @var value-of<Operator> $operator */
    #[Required(enum: Operator::class)]
    public string $operator;

    #[Optional]
    public ?string $propertyName;

    #[Optional]
    public ?float $value;

    /**
     * `new NumberPropertyVariable()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NumberPropertyVariable::with(operator: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NumberPropertyVariable)->withOperator(...)
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
     */
    public static function with(
        Operator|string $operator = 'NUMBER_PROPERTY_VARIABLE',
        ?string $propertyName = null,
        ?float $value = null,
    ): self {
        $self = new self;

        $self['operator'] = $operator;

        null !== $propertyName && $self['propertyName'] = $propertyName;
        null !== $value && $self['value'] = $value;

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
