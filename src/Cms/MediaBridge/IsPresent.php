<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge;

use HubSpotSDK\Cms\MediaBridge\IsPresent\Operator;
use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type IsPresentShape = array{
 *   expressionToEvaluate: mixed,
 *   operator: Operator|value-of<Operator>,
 *   propertyName?: string|null,
 *   value?: bool|null,
 * }
 */
final class IsPresent implements BaseModel
{
    /** @use SdkModel<IsPresentShape> */
    use SdkModel;

    #[Required]
    public mixed $expressionToEvaluate;

    /** @var value-of<Operator> $operator */
    #[Required(enum: Operator::class)]
    public string $operator;

    #[Optional]
    public ?string $propertyName;

    #[Optional]
    public ?bool $value;

    /**
     * `new IsPresent()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IsPresent::with(expressionToEvaluate: ..., operator: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IsPresent)->withExpressionToEvaluate(...)->withOperator(...)
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
        mixed $expressionToEvaluate,
        Operator|string $operator = 'IS_PRESENT',
        ?string $propertyName = null,
        ?bool $value = null,
    ): self {
        $self = new self;

        $self['expressionToEvaluate'] = $expressionToEvaluate;
        $self['operator'] = $operator;

        null !== $propertyName && $self['propertyName'] = $propertyName;
        null !== $value && $self['value'] = $value;

        return $self;
    }

    public function withExpressionToEvaluate(mixed $expressionToEvaluate): self
    {
        $self = clone $this;
        $self['expressionToEvaluate'] = $expressionToEvaluate;

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

    public function withValue(bool $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
