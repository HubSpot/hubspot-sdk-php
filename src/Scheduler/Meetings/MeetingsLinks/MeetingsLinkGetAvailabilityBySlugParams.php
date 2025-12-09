<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings\MeetingsLinks;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Get the next availability times for a meeting page.
 *
 * @see HubspotSDK\Services\Scheduler\Meetings\MeetingsLinksService::getAvailabilityBySlug()
 *
 * @phpstan-type MeetingsLinkGetAvailabilityBySlugParamsShape = array{
 *   timezone: string, monthOffset?: int
 * }
 */
final class MeetingsLinkGetAvailabilityBySlugParams implements BaseModel
{
    /** @use SdkModel<MeetingsLinkGetAvailabilityBySlugParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Return times in response based on specified time zone.
     */
    #[Required]
    public string $timezone;

    /**
     * Get times for a different month.
     */
    #[Optional]
    public ?int $monthOffset;

    /**
     * `new MeetingsLinkGetAvailabilityBySlugParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MeetingsLinkGetAvailabilityBySlugParams::with(timezone: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MeetingsLinkGetAvailabilityBySlugParams)->withTimezone(...)
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
    public static function with(string $timezone, ?int $monthOffset = null): self
    {
        $self = new self;

        $self['timezone'] = $timezone;

        null !== $monthOffset && $self['monthOffset'] = $monthOffset;

        return $self;
    }

    /**
     * Return times in response based on specified time zone.
     */
    public function withTimezone(string $timezone): self
    {
        $self = clone $this;
        $self['timezone'] = $timezone;

        return $self;
    }

    /**
     * Get times for a different month.
     */
    public function withMonthOffset(int $monthOffset): self
    {
        $self = clone $this;
        $self['monthOffset'] = $monthOffset;

        return $self;
    }
}
