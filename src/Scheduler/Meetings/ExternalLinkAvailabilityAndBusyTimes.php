<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ExternalLinkAvailabilityAndBusyTimesShape = array{
 *   allUsersBusyTimes: list<ExternalUserBusyTimes>,
 *   linkAvailability?: ExternalLinkAvailability|null,
 * }
 */
final class ExternalLinkAvailabilityAndBusyTimes implements BaseModel
{
    /** @use SdkModel<ExternalLinkAvailabilityAndBusyTimesShape> */
    use SdkModel;

    /** @var list<ExternalUserBusyTimes> $allUsersBusyTimes */
    #[Required(list: ExternalUserBusyTimes::class)]
    public array $allUsersBusyTimes;

    #[Optional]
    public ?ExternalLinkAvailability $linkAvailability;

    /**
     * `new ExternalLinkAvailabilityAndBusyTimes()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExternalLinkAvailabilityAndBusyTimes::with(allUsersBusyTimes: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExternalLinkAvailabilityAndBusyTimes)->withAllUsersBusyTimes(...)
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
     * @param list<ExternalUserBusyTimes|array{
     *   busyTimes: list<ExternalTimeRange>,
     *   isOffline: bool,
     *   meetingsUser: ExternalMeetingsUser,
     * }> $allUsersBusyTimes
     * @param ExternalLinkAvailability|array{
     *   hasMore: bool,
     *   linkAvailabilityByDuration: array<string,ExternalLinkAvailabilityForDuration>,
     * } $linkAvailability
     */
    public static function with(
        array $allUsersBusyTimes,
        ExternalLinkAvailability|array|null $linkAvailability = null,
    ): self {
        $obj = new self;

        $obj['allUsersBusyTimes'] = $allUsersBusyTimes;

        null !== $linkAvailability && $obj['linkAvailability'] = $linkAvailability;

        return $obj;
    }

    /**
     * @param list<ExternalUserBusyTimes|array{
     *   busyTimes: list<ExternalTimeRange>,
     *   isOffline: bool,
     *   meetingsUser: ExternalMeetingsUser,
     * }> $allUsersBusyTimes
     */
    public function withAllUsersBusyTimes(array $allUsersBusyTimes): self
    {
        $obj = clone $this;
        $obj['allUsersBusyTimes'] = $allUsersBusyTimes;

        return $obj;
    }

    /**
     * @param ExternalLinkAvailability|array{
     *   hasMore: bool,
     *   linkAvailabilityByDuration: array<string,ExternalLinkAvailabilityForDuration>,
     * } $linkAvailability
     */
    public function withLinkAvailability(
        ExternalLinkAvailability|array $linkAvailability
    ): self {
        $obj = clone $this;
        $obj['linkAvailability'] = $linkAvailability;

        return $obj;
    }
}
