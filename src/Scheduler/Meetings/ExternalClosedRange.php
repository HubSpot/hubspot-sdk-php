<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ExternalClosedRangeShape = array{end: int, start: int}
 */
final class ExternalClosedRange implements BaseModel
{
    /** @use SdkModel<ExternalClosedRangeShape> */
    use SdkModel;

    #[Api]
    public int $end;

    #[Api]
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
        $obj = new self;

        $obj['end'] = $end;
        $obj['start'] = $start;

        return $obj;
    }

    public function withEnd(int $end): self
    {
        $obj = clone $this;
        $obj['end'] = $end;

        return $obj;
    }

    public function withStart(int $start): self
    {
        $obj = clone $this;
        $obj['start'] = $start;

        return $obj;
    }
}
