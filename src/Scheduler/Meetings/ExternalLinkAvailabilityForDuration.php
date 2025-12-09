<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ExternalLinkAvailabilityForDurationShape = array{
 *   availabilities: list<ExternalMeetingAvailability>, meetingDurationMillis: int
 * }
 */
final class ExternalLinkAvailabilityForDuration implements BaseModel
{
    /** @use SdkModel<ExternalLinkAvailabilityForDurationShape> */
    use SdkModel;

    /** @var list<ExternalMeetingAvailability> $availabilities */
    #[Required(list: ExternalMeetingAvailability::class)]
    public array $availabilities;

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
     * @param list<ExternalMeetingAvailability|array{
     *   endMillisUtc: int, startMillisUtc: int
     * }> $availabilities
     */
    public static function with(
        array $availabilities,
        int $meetingDurationMillis
    ): self {
        $obj = new self;

        $obj['availabilities'] = $availabilities;
        $obj['meetingDurationMillis'] = $meetingDurationMillis;

        return $obj;
    }

    /**
     * @param list<ExternalMeetingAvailability|array{
     *   endMillisUtc: int, startMillisUtc: int
     * }> $availabilities
     */
    public function withAvailabilities(array $availabilities): self
    {
        $obj = clone $this;
        $obj['availabilities'] = $availabilities;

        return $obj;
    }

    public function withMeetingDurationMillis(int $meetingDurationMillis): self
    {
        $obj = clone $this;
        $obj['meetingDurationMillis'] = $meetingDurationMillis;

        return $obj;
    }
}
