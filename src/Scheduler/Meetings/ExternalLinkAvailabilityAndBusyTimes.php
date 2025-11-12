<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Api;
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
    #[Api(list: ExternalUserBusyTimes::class)]
    public array $allUsersBusyTimes;

    #[Api(optional: true)]
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
     * @param list<ExternalUserBusyTimes> $allUsersBusyTimes
     */
    public static function with(
        array $allUsersBusyTimes,
        ?ExternalLinkAvailability $linkAvailability = null
    ): self {
        $obj = new self;

        $obj->allUsersBusyTimes = $allUsersBusyTimes;

        null !== $linkAvailability && $obj->linkAvailability = $linkAvailability;

        return $obj;
    }

    /**
     * @param list<ExternalUserBusyTimes> $allUsersBusyTimes
     */
    public function withAllUsersBusyTimes(array $allUsersBusyTimes): self
    {
        $obj = clone $this;
        $obj->allUsersBusyTimes = $allUsersBusyTimes;

        return $obj;
    }

    public function withLinkAvailability(
        ExternalLinkAvailability $linkAvailability
    ): self {
        $obj = clone $this;
        $obj->linkAvailability = $linkAvailability;

        return $obj;
    }
}
