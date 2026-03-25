<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ExternalClosedRangeShape = array{end: int, start: int}
 */
final class ExternalClosedRange implements BaseModel
{
    /** @use SdkModel<ExternalClosedRangeShape> */
    use SdkModel;

    /**
     * The end value of the closed range, represented as an integer.
     */
    #[Required]
    public int $end;

    /**
     * The start value of the closed range, represented as an integer.
     */
    #[Required]
    public int $start;

    /**
     * `new ExternalClosedRange()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExternalClosedRange::with(end: ..., start: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExternalClosedRange)->withEnd(...)->withStart(...)
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
    public static function with(int $end, int $start): self
    {
        $self = new self;

        $self['end'] = $end;
        $self['start'] = $start;

        return $self;
    }

    /**
     * The end value of the closed range, represented as an integer.
     */
    public function withEnd(int $end): self
    {
        $self = clone $this;
        $self['end'] = $end;

        return $self;
    }

    /**
     * The start value of the closed range, represented as an integer.
     */
    public function withStart(int $start): self
    {
        $self = clone $this;
        $self['start'] = $start;

        return $self;
    }
}
