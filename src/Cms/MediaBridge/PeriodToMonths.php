<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Cms\MediaBridge\PeriodToMonths\Input;
use HubspotSDK\Cms\MediaBridge\PeriodToMonths\Operator;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PeriodToMonthsShape = array{
 *   operator: Operator|value-of<Operator>,
 *   inputs?: list<mixed>|null,
 *   propertyName?: string|null,
 *   value?: float|null,
 * }
 */
final class PeriodToMonths implements BaseModel
{
    /** @use SdkModel<PeriodToMonthsShape> */
    use SdkModel;

    /** @var value-of<Operator> $operator */
    #[Required(enum: Operator::class)]
    public string $operator;

    /** @var list<mixed>|null $inputs */
    #[Optional(list: Input::class)]
    public ?array $inputs;

    #[Optional]
    public ?string $propertyName;

    #[Optional]
    public ?float $value;

    /**
     * `new PeriodToMonths()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PeriodToMonths::with(operator: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PeriodToMonths)->withOperator(...)
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
        Operator|string $operator = 'PERIOD_TO_MONTHS',
        ?array $inputs = null,
        ?string $propertyName = null,
        ?float $value = null,
    ): self {
        $self = new self;

        $self['operator'] = $operator;

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
