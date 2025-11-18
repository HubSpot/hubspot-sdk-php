<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings\MeetingsLinks;

use HubspotSDK\Core\Attributes\Api;
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
    #[Api]
    public string $timezone;

    /**
     * Get times for a different month.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        $obj->timezone = $timezone;

        null !== $monthOffset && $obj->monthOffset = $monthOffset;

        return $obj;
    }

    /**
     * Return times in response based on specified time zone.
     */
    public function withTimezone(string $timezone): self
    {
        $obj = clone $this;
        $obj->timezone = $timezone;

        return $obj;
    }

    /**
     * Get times for a different month.
     */
    public function withMonthOffset(int $monthOffset): self
    {
        $obj = clone $this;
        $obj->monthOffset = $monthOffset;

        return $obj;
    }
}
