<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicTimeOffsetShape = array{
 *   amount: int, offsetDirection: string, timeUnit: string
 * }
 */
final class PublicTimeOffset implements BaseModel
{
    /** @use SdkModel<PublicTimeOffsetShape> */
    use SdkModel;

    #[Required]
    public int $amount;

    #[Required]
    public string $offsetDirection;

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

    public function withAmount(int $amount): self
    {
        $self = clone $this;
        $self['amount'] = $amount;

        return $self;
    }

    public function withOffsetDirection(string $offsetDirection): self
    {
        $self = clone $this;
        $self['offsetDirection'] = $offsetDirection;

        return $self;
    }

    public function withTimeUnit(string $timeUnit): self
    {
        $self = clone $this;
        $self['timeUnit'] = $timeUnit;

        return $self;
    }
}
