<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge;

use HubSpotSDK\Cms\MediaBridge\AddTime\Input;
use HubSpotSDK\Cms\MediaBridge\AddTime\Operator;
use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type AddTimeShape = array{
 *   operator: Operator|value-of<Operator>,
 *   stringToCheck: mixed,
 *   inputs?: list<mixed>|null,
 *   propertyName?: string|null,
 *   value?: float|null,
 * }
 */
final class AddTime implements BaseModel
{
    /** @use SdkModel<AddTimeShape> */
    use SdkModel;

    /** @var value-of<Operator> $operator */
    #[Required(enum: Operator::class)]
    public string $operator;

    #[Required]
    public mixed $stringToCheck;

    /** @var list<mixed>|null $inputs */
    #[Optional(list: Input::class)]
    public ?array $inputs;

    #[Optional]
    public ?string $propertyName;

    #[Optional]
    public ?float $value;

    /**
     * `new AddTime()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AddTime::with(operator: ..., stringToCheck: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AddTime)->withOperator(...)->withStringToCheck(...)
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
        mixed $stringToCheck,
        Operator|string $operator = 'ADD_TIME',
        ?array $inputs = null,
        ?string $propertyName = null,
        ?float $value = null,
    ): self {
        $self = new self;

        $self['operator'] = $operator;
        $self['stringToCheck'] = $stringToCheck;

        null !== $inputs && $self['inputs'] = $inputs;
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

    public function withStringToCheck(mixed $stringToCheck): self
    {
        $self = clone $this;
        $self['stringToCheck'] = $stringToCheck;

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

    public function withValue(float $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
