<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Api;
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

    #[Api]
    public bool $canAddGuests;

    #[Api]
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
        $obj = new self;

        $obj->canAddGuests = $canAddGuests;
        $obj->maxGuestCount = $maxGuestCount;

        return $obj;
    }

    public function withCanAddGuests(bool $canAddGuests): self
    {
        $obj = clone $this;
        $obj->canAddGuests = $canAddGuests;

        return $obj;
    }

    public function withMaxGuestCount(int $maxGuestCount): self
    {
        $obj = clone $this;
        $obj->maxGuestCount = $maxGuestCount;

        return $obj;
    }
}
