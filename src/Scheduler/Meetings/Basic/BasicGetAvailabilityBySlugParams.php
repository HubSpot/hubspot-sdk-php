<?php

declare(strict_types=1);

namespace HubSpotSDK\Scheduler\Meetings\Basic;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Get the next availability times for a meeting page.
 *
 * @see HubSpotSDK\Services\Scheduler\Meetings\BasicService::getAvailabilityBySlug()
 *
 * @phpstan-type BasicGetAvailabilityBySlugParamsShape = array{
 *   timezone: string, monthOffset?: int|null
 * }
 */
final class BasicGetAvailabilityBySlugParams implements BaseModel
{
    /** @use SdkModel<BasicGetAvailabilityBySlugParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $timezone;

    #[Optional]
    public ?int $monthOffset;

    /**
     * `new BasicGetAvailabilityBySlugParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BasicGetAvailabilityBySlugParams::with(timezone: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BasicGetAvailabilityBySlugParams)->withTimezone(...)
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

    public function withTimezone(string $timezone): self
    {
        $self = clone $this;
        $self['timezone'] = $timezone;

        return $self;
    }

    public function withMonthOffset(int $monthOffset): self
    {
        $self = clone $this;
        $self['monthOffset'] = $monthOffset;

        return $self;
    }
}
