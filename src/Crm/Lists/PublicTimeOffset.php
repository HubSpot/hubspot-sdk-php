<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicTimeOffsetShape = array{
 *   amount: int, offsetDirection: string, timeUnit: string
 * }
 */
final class PublicTimeOffset implements BaseModel
{
    /** @use SdkModel<PublicTimeOffsetShape> */
    use SdkModel;

    /**
     * The numerical value representing the quantity of the time offset.
     */
    #[Required]
    public int $amount;

    /**
     * Indicates the direction of the time offset, such as forward or backward.
     */
    #[Required]
    public string $offsetDirection;

    /**
     * Specifies the unit of time for the offset, such as days, hours, or minutes.
     */
    #[Required]
    public string $timeUnit;

    /**
     * `new PublicTimeOffset()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicTimeOffset::with(amount: ..., offsetDirection: ..., timeUnit: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicTimeOffset)
     *   ->withAmount(...)
     *   ->withOffsetDirection(...)
     *   ->withTimeUnit(...)
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
     */
    public static function with(
        int $amount,
        string $offsetDirection,
        string $timeUnit
    ): self {
        $self = new self;

        $self['amount'] = $amount;
        $self['offsetDirection'] = $offsetDirection;
        $self['timeUnit'] = $timeUnit;

        return $self;
    }

    /**
     * The numerical value representing the quantity of the time offset.
     */
    public function withAmount(int $amount): self
    {
        $self = clone $this;
        $self['amount'] = $amount;

        return $self;
    }

    /**
     * Indicates the direction of the time offset, such as forward or backward.
     */
    public function withOffsetDirection(string $offsetDirection): self
    {
        $self = clone $this;
        $self['offsetDirection'] = $offsetDirection;

        return $self;
    }

    /**
     * Specifies the unit of time for the offset, such as days, hours, or minutes.
     */
    public function withTimeUnit(string $timeUnit): self
    {
        $self = clone $this;
        $self['timeUnit'] = $timeUnit;

        return $self;
    }
}
