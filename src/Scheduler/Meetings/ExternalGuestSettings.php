<?php

declare(strict_types=1);

namespace HubSpotSDK\Scheduler\Meetings;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ExternalGuestSettingsShape = array{
 *   canAddGuests: bool, maxGuestCount: int
 * }
 */
final class ExternalGuestSettings implements BaseModel
{
    /** @use SdkModel<ExternalGuestSettingsShape> */
    use SdkModel;

    /**
     * Indicates whether guests can be added to the meeting.
     */
    #[Required]
    public bool $canAddGuests;

    /**
     * The maximum number of guests that can be added to the meeting.
     */
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

    /**
     * Indicates whether guests can be added to the meeting.
     */
    public function withCanAddGuests(bool $canAddGuests): self
    {
        $self = clone $this;
        $self['canAddGuests'] = $canAddGuests;

        return $self;
    }

    /**
     * The maximum number of guests that can be added to the meeting.
     */
    public function withMaxGuestCount(int $maxGuestCount): self
    {
        $self = clone $this;
        $self['maxGuestCount'] = $maxGuestCount;

        return $self;
    }
}
