<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ExternalTimeRangeShape from \HubspotSDK\Scheduler\Meetings\ExternalTimeRange
 * @phpstan-import-type ExternalMeetingsUserShape from \HubspotSDK\Scheduler\Meetings\ExternalMeetingsUser
 *
 * @phpstan-type ExternalUserBusyTimesShape = array{
 *   busyTimes: list<ExternalTimeRangeShape>,
 *   isOffline: bool,
 *   meetingsUser: ExternalMeetingsUser|ExternalMeetingsUserShape,
 * }
 */
final class ExternalUserBusyTimes implements BaseModel
{
    /** @use SdkModel<ExternalUserBusyTimesShape> */
    use SdkModel;

    /** @var list<ExternalTimeRange> $busyTimes */
    #[Required(list: ExternalTimeRange::class)]
    public array $busyTimes;

    #[Required]
    public bool $isOffline;

    #[Required]
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
     * @param list<ExternalTimeRangeShape> $busyTimes
     * @param ExternalMeetingsUserShape $meetingsUser
     */
    public static function with(
        array $busyTimes,
        bool $isOffline,
        ExternalMeetingsUser|array $meetingsUser
    ): self {
        $self = new self;

        $self['busyTimes'] = $busyTimes;
        $self['isOffline'] = $isOffline;
        $self['meetingsUser'] = $meetingsUser;

        return $self;
    }

    /**
     * @param list<ExternalTimeRangeShape> $busyTimes
     */
    public function withBusyTimes(array $busyTimes): self
    {
        $self = clone $this;
        $self['busyTimes'] = $busyTimes;

        return $self;
    }

    public function withIsOffline(bool $isOffline): self
    {
        $self = clone $this;
        $self['isOffline'] = $isOffline;

        return $self;
    }

    /**
     * @param ExternalMeetingsUserShape $meetingsUser
     */
    public function withMeetingsUser(
        ExternalMeetingsUser|array $meetingsUser
    ): self {
        $self = clone $this;
        $self['meetingsUser'] = $meetingsUser;

        return $self;
    }
}
