<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type IntervalShape = array{
 *   end: \DateTimeInterface, start: \DateTimeInterface
 * }
 */
final class Interval implements BaseModel
{
    /** @use SdkModel<IntervalShape> */
    use SdkModel;

    #[Required]
    public \DateTimeInterface $end;

    #[Required]
    public \DateTimeInterface $start;

    /**
     * `new Interval()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Interval::with(end: ..., start: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Interval)->withEnd(...)->withStart(...)
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
        \DateTimeInterface $end,
        \DateTimeInterface $start
    ): self {
        $self = new self;

        $self['end'] = $end;
        $self['start'] = $start;

        return $self;
    }

    public function withEnd(\DateTimeInterface $end): self
    {
        $self = clone $this;
        $self['end'] = $end;

        return $self;
    }

    public function withStart(\DateTimeInterface $start): self
    {
        $self = clone $this;
        $self['start'] = $start;

        return $self;
    }
}
