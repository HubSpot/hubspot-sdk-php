<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Cms\MediaBridge\Contains\Operator;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\MapOf;

/**
 * @phpstan-type ContainsShape = array{
 *   operator: Operator|value-of<Operator>,
 *   stringToCheck: array<string,mixed>,
 *   inputs?: list<array<string,mixed>>|null,
 *   propertyName?: string|null,
 *   value?: bool|null,
 * }
 */
final class Contains implements BaseModel
{
    /** @use SdkModel<ContainsShape> */
    use SdkModel;

    /** @var value-of<Operator> $operator */
    #[Required(enum: Operator::class)]
    public string $operator;

    /** @var array<string,mixed> $stringToCheck */
    #[Required(map: 'mixed')]
    public array $stringToCheck;

    /** @var list<array<string,mixed>>|null $inputs */
    #[Optional(list: new MapOf('mixed'))]
    public ?array $inputs;

    #[Optional]
    public ?string $propertyName;

    #[Optional]
    public ?bool $value;

    /**
     * `new Contains()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Contains::with(operator: ..., stringToCheck: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Contains)->withOperator(...)->withStringToCheck(...)
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
     * @param list<array<string,mixed>>|null $inputs
     */
    public static function with(
        array $stringToCheck,
        Operator|string $operator = 'CONTAINS',
        ?array $inputs = null,
        ?string $propertyName = null,
        ?bool $value = null,
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

    /**
     * @param array<string,mixed> $stringToCheck
     */
    public function withStringToCheck(array $stringToCheck): self
    {
        $self = clone $this;
        $self['stringToCheck'] = $stringToCheck;

        return $self;
    }

    /**
     * @param list<array<string,mixed>> $inputs
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
