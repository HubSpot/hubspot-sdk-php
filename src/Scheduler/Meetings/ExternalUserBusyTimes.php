<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ExternalUserBusyTimesShape = array{
 *   busyTimes: list<ExternalTimeRange>,
 *   isOffline: bool,
 *   meetingsUser: ExternalMeetingsUser,
 * }
 */
final class ExternalUserBusyTimes implements BaseModel
{
    /** @use SdkModel<ExternalUserBusyTimesShape> */
    use SdkModel;

    /** @var list<ExternalTimeRange> $busyTimes */
    #[Api(list: ExternalTimeRange::class)]
    public array $busyTimes;

    #[Api]
    public bool $isOffline;

    #[Api]
    public ExternalMeetingsUser $meetingsUser;

    /**
     * `new ExternalUserBusyTimes()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExternalUserBusyTimes::with(busyTimes: ..., isOffline: ..., meetingsUser: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExternalUserBusyTimes)
     *   ->withBusyTimes(...)
     *   ->withIsOffline(...)
     *   ->withMeetingsUser(...)
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
     *
     * @param list<ExternalTimeRange> $busyTimes
     */
    public static function with(
        array $busyTimes,
        bool $isOffline,
        ExternalMeetingsUser $meetingsUser
    ): self {
        $obj = new self;

        $obj->busyTimes = $busyTimes;
        $obj->isOffline = $isOffline;
        $obj->meetingsUser = $meetingsUser;

        return $obj;
    }

    /**
     * @param list<ExternalTimeRange> $busyTimes
     */
    public function withBusyTimes(array $busyTimes): self
    {
        $obj = clone $this;
        $obj->busyTimes = $busyTimes;

        return $obj;
    }

    public function withIsOffline(bool $isOffline): self
    {
        $obj = clone $this;
        $obj->isOffline = $isOffline;

        return $obj;
    }

    public function withMeetingsUser(ExternalMeetingsUser $meetingsUser): self
    {
        $obj = clone $this;
        $obj->meetingsUser = $meetingsUser;

        return $obj;
    }
}
