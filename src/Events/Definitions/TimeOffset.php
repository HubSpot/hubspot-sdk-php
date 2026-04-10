<?php

declare(strict_types=1);

namespace HubSpotSDK\Events\Definitions;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Events\Definitions\TimeOffset\OffsetDirection;
use HubSpotSDK\Events\Definitions\TimeOffset\TimeUnit;

/**
 * @phpstan-type TimeOffsetShape = array{
 *   amount: int,
 *   offsetDirection: OffsetDirection|value-of<OffsetDirection>,
 *   timeUnit: TimeUnit|value-of<TimeUnit>,
 * }
 */
final class TimeOffset implements BaseModel
{
    /** @use SdkModel<TimeOffsetShape> */
    use SdkModel;

    #[Required]
    public int $amount;

    /** @var value-of<OffsetDirection> $offsetDirection */
    #[Required(enum: OffsetDirection::class)]
    public string $offsetDirection;

    /** @var value-of<TimeUnit> $timeUnit */
    #[Required(enum: TimeUnit::class)]
    public string $timeUnit;

    /**
     * `new TimeOffset()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TimeOffset::with(amount: ..., offsetDirection: ..., timeUnit: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TimeOffset)->withAmount(...)->withOffsetDirection(...)->withTimeUnit(...)
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
     * @param OffsetDirection|value-of<OffsetDirection> $offsetDirection
     * @param TimeUnit|value-of<TimeUnit> $timeUnit
     */
    public static function with(
        int $amount,
        OffsetDirection|string $offsetDirection,
        TimeUnit|string $timeUnit,
    ): self {
        $self = new self;

        $self['amount'] = $amount;
        $self['offsetDirection'] = $offsetDirection;
        $self['timeUnit'] = $timeUnit;

        return $self;
    }

    public function withAmount(int $amount): self
    {
        $self = clone $this;
        $self['amount'] = $amount;

        return $self;
    }

    /**
     * @param OffsetDirection|value-of<OffsetDirection> $offsetDirection
     */
    public function withOffsetDirection(
        OffsetDirection|string $offsetDirection
    ): self {
        $self = clone $this;
        $self['offsetDirection'] = $offsetDirection;

        return $self;
    }

    /**
     * @param TimeUnit|value-of<TimeUnit> $timeUnit
     */
    public function withTimeUnit(TimeUnit|string $timeUnit): self
    {
        $self = clone $this;
        $self['timeUnit'] = $timeUnit;

        return $self;
    }
}
