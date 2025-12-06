<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ExternalMeetingAvailabilityShape = array{
 *   endMillisUtc: int, startMillisUtc: int
 * }
 */
final class ExternalMeetingAvailability implements BaseModel
{
    /** @use SdkModel<ExternalMeetingAvailabilityShape> */
    use SdkModel;

    #[Api]
    public int $endMillisUtc;

    #[Api]
    public int $startMillisUtc;

    /**
     * `new ExternalMeetingAvailability()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExternalMeetingAvailability::with(endMillisUtc: ..., startMillisUtc: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExternalMeetingAvailability)
     *   ->withEndMillisUtc(...)
     *   ->withStartMillisUtc(...)
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
    public static function with(int $endMillisUtc, int $startMillisUtc): self
    {
        $obj = new self;

        $obj['endMillisUtc'] = $endMillisUtc;
        $obj['startMillisUtc'] = $startMillisUtc;

        return $obj;
    }

    public function withEndMillisUtc(int $endMillisUtc): self
    {
        $obj = clone $this;
        $obj['endMillisUtc'] = $endMillisUtc;

        return $obj;
    }

    public function withStartMillisUtc(int $startMillisUtc): self
    {
        $obj = clone $this;
        $obj['startMillisUtc'] = $startMillisUtc;

        return $obj;
    }
}
