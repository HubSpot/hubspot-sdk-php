<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Required;
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

    #[Required]
    public int $endMillisUtc;

    #[Required]
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
        $self = new self;

        $self['endMillisUtc'] = $endMillisUtc;
        $self['startMillisUtc'] = $startMillisUtc;

        return $self;
    }

    public function withEndMillisUtc(int $endMillisUtc): self
    {
        $self = clone $this;
        $self['endMillisUtc'] = $endMillisUtc;

        return $self;
    }

    public function withStartMillisUtc(int $startMillisUtc): self
    {
        $self = clone $this;
        $self['startMillisUtc'] = $startMillisUtc;

        return $self;
    }
}
