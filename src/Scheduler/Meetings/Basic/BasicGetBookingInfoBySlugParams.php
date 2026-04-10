<?php

declare(strict_types=1);

namespace HubSpotSDK\Scheduler\Meetings\Basic;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Get details about the initial information necessary for a meeting scheduler.
 *
 * @see HubSpotSDK\Services\Scheduler\Meetings\BasicService::getBookingInfoBySlug()
 *
 * @phpstan-type BasicGetBookingInfoBySlugParamsShape = array{timezone: string}
 */
final class BasicGetBookingInfoBySlugParams implements BaseModel
{
    /** @use SdkModel<BasicGetBookingInfoBySlugParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $timezone;

    /**
     * `new BasicGetBookingInfoBySlugParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BasicGetBookingInfoBySlugParams::with(timezone: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BasicGetBookingInfoBySlugParams)->withTimezone(...)
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
        $self = new self;

        $self['timezone'] = $timezone;

        return $self;
    }

    public function withTimezone(string $timezone): self
    {
        $self = clone $this;
        $self['timezone'] = $timezone;

        return $self;
    }
}
