<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ExternalGuestSettingsShape = array{
 *   canAddGuests: bool, maxGuestCount: int
 * }
 */
final class ExternalGuestSettings implements BaseModel
{
    /** @use SdkModel<ExternalGuestSettingsShape> */
    use SdkModel;

    #[Required]
    public bool $canAddGuests;

    #[Required]
    public int $maxGuestCount;

    /**
     * `new ExternalGuestSettings()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExternalGuestSettings::with(canAddGuests: ..., maxGuestCount: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExternalGuestSettings)->withCanAddGuests(...)->withMaxGuestCount(...)
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
    public static function with(bool $canAddGuests, int $maxGuestCount): self
    {
        $self = new self;

        $self['canAddGuests'] = $canAddGuests;
        $self['maxGuestCount'] = $maxGuestCount;

        return $self;
    }

    public function withCanAddGuests(bool $canAddGuests): self
    {
        $self = clone $this;
        $self['canAddGuests'] = $canAddGuests;

        return $self;
    }

    public function withMaxGuestCount(int $maxGuestCount): self
    {
        $self = clone $this;
        $self['maxGuestCount'] = $maxGuestCount;

        return $self;
    }
}
