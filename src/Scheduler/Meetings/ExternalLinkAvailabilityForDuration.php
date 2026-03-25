<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ExternalMeetingAvailabilityShape from \HubspotSDK\Scheduler\Meetings\ExternalMeetingAvailability
 *
 * @phpstan-type ExternalLinkAvailabilityForDurationShape = array{
 *   availabilities: list<ExternalMeetingAvailability|ExternalMeetingAvailabilityShape>,
 *   meetingDurationMillis: int,
 * }
 */
final class ExternalLinkAvailabilityForDuration implements BaseModel
{
    /** @use SdkModel<ExternalLinkAvailabilityForDurationShape> */
    use SdkModel;

    /** @var list<ExternalMeetingAvailability> $availabilities */
    #[Required(list: ExternalMeetingAvailability::class)]
    public array $availabilities;

    /**
     * The duration of the meeting in milliseconds.
     */
    #[Required]
    public int $meetingDurationMillis;

    /**
     * `new ExternalLinkAvailabilityForDuration()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExternalLinkAvailabilityForDuration::with(
     *   availabilities: ..., meetingDurationMillis: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExternalLinkAvailabilityForDuration)
     *   ->withAvailabilities(...)
     *   ->withMeetingDurationMillis(...)
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
     * @param list<ExternalMeetingAvailability|ExternalMeetingAvailabilityShape> $availabilities
     */
    public static function with(
        array $availabilities,
        int $meetingDurationMillis
    ): self {
        $self = new self;

        $self['availabilities'] = $availabilities;
        $self['meetingDurationMillis'] = $meetingDurationMillis;

        return $self;
    }

    /**
     * @param list<ExternalMeetingAvailability|ExternalMeetingAvailabilityShape> $availabilities
     */
    public function withAvailabilities(array $availabilities): self
    {
        $self = clone $this;
        $self['availabilities'] = $availabilities;

        return $self;
    }

    /**
     * The duration of the meeting in milliseconds.
     */
    public function withMeetingDurationMillis(int $meetingDurationMillis): self
    {
        $self = clone $this;
        $self['meetingDurationMillis'] = $meetingDurationMillis;

        return $self;
    }
}
