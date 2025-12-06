<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Api;
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

    #[Api]
    public int $attended;

    #[Api]
    public int $cancelled;

    #[Api]
    public int $noShows;

    #[Api]
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
        $obj = new self;

        $obj['attended'] = $attended;
        $obj['cancelled'] = $cancelled;
        $obj['noShows'] = $noShows;
        $obj['registered'] = $registered;

        return $obj;
    }

    public function withAttended(int $attended): self
    {
        $obj = clone $this;
        $obj['attended'] = $attended;

        return $obj;
    }

    public function withCancelled(int $cancelled): self
    {
        $obj = clone $this;
        $obj['cancelled'] = $cancelled;

        return $obj;
    }

    public function withNoShows(int $noShows): self
    {
        $obj = clone $this;
        $obj['noShows'] = $noShows;

        return $obj;
    }

    public function withRegistered(int $registered): self
    {
        $obj = clone $this;
        $obj['registered'] = $registered;

        return $obj;
    }
}
