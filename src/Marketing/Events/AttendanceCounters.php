<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type AttendanceCountersShape = array{
 *   attended: int, cancelled: int, noShows: int, registered: int
 * }
 */
final class AttendanceCounters implements BaseModel
{
    /** @use SdkModel<AttendanceCountersShape> */
    use SdkModel;

    /**
     * Number of attended contact records of a marketing event.
     */
    #[Required]
    public int $attended;

    /**
     * Number of cancelled contact records of a marketing event.
     */
    #[Required]
    public int $cancelled;

    /**
     * Number of no-show contact records of a marketing event.
     */
    #[Required]
    public int $noShows;

    /**
     * Number of registered contact records of a marketing event.
     */
    #[Required]
    public int $registered;

    /**
     * `new AttendanceCounters()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AttendanceCounters::with(
     *   attended: ..., cancelled: ..., noShows: ..., registered: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AttendanceCounters)
     *   ->withAttended(...)
     *   ->withCancelled(...)
     *   ->withNoShows(...)
     *   ->withRegistered(...)
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
        int $attended,
        int $cancelled,
        int $noShows,
        int $registered
    ): self {
        $self = new self;

        $self['attended'] = $attended;
        $self['cancelled'] = $cancelled;
        $self['noShows'] = $noShows;
        $self['registered'] = $registered;

        return $self;
    }

    /**
     * Number of attended contact records of a marketing event.
     */
    public function withAttended(int $attended): self
    {
        $self = clone $this;
        $self['attended'] = $attended;

        return $self;
    }

    /**
     * Number of cancelled contact records of a marketing event.
     */
    public function withCancelled(int $cancelled): self
    {
        $self = clone $this;
        $self['cancelled'] = $cancelled;

        return $self;
    }

    /**
     * Number of no-show contact records of a marketing event.
     */
    public function withNoShows(int $noShows): self
    {
        $self = clone $this;
        $self['noShows'] = $noShows;

        return $self;
    }

    /**
     * Number of registered contact records of a marketing event.
     */
    public function withRegistered(int $registered): self
    {
        $self = clone $this;
        $self['registered'] = $registered;

        return $self;
    }
}
