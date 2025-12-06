<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings\MeetingsLinks;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Get details about the initial information necessary for a meeting scheduler.
 *
 * @see HubspotSDK\Services\Scheduler\Meetings\MeetingsLinksService::getBookingInfoBySlug()
 *
 * @phpstan-type MeetingsLinkGetBookingInfoBySlugParamsShape = array{
 *   timezone: string
 * }
 */
final class MeetingsLinkGetBookingInfoBySlugParams implements BaseModel
{
    /** @use SdkModel<MeetingsLinkGetBookingInfoBySlugParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Return times in response based on specified time zone.
     */
    #[Api]
    public string $timezone;

    /**
     * `new MeetingsLinkGetBookingInfoBySlugParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MeetingsLinkGetBookingInfoBySlugParams::with(timezone: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MeetingsLinkGetBookingInfoBySlugParams)->withTimezone(...)
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
    public static function with(string $timezone): self
    {
        $obj = new self;

        $obj['timezone'] = $timezone;

        return $obj;
    }

    /**
     * Return times in response based on specified time zone.
     */
    public function withTimezone(string $timezone): self
    {
        $obj = clone $this;
        $obj['timezone'] = $timezone;

        return $obj;
    }
}
