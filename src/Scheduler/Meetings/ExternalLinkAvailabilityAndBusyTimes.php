<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ExternalUserBusyTimesShape from \HubspotSDK\Scheduler\Meetings\ExternalUserBusyTimes
 * @phpstan-import-type ExternalLinkAvailabilityShape from \HubspotSDK\Scheduler\Meetings\ExternalLinkAvailability
 *
 * @phpstan-type ExternalLinkAvailabilityAndBusyTimesShape = array{
 *   allUsersBusyTimes: list<ExternalUserBusyTimesShape>,
 *   linkAvailability?: null|ExternalLinkAvailability|ExternalLinkAvailabilityShape,
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
     * @param list<ExternalUserBusyTimesShape> $allUsersBusyTimes
     * @param ExternalLinkAvailability|ExternalLinkAvailabilityShape|null $linkAvailability
     */
    public static function with(
        array $allUsersBusyTimes,
        ExternalLinkAvailability|array|null $linkAvailability = null,
    ): self {
        $self = new self;

        $self['allUsersBusyTimes'] = $allUsersBusyTimes;

        null !== $linkAvailability && $self['linkAvailability'] = $linkAvailability;

        return $self;
    }

    /**
     * @param list<ExternalUserBusyTimesShape> $allUsersBusyTimes
     */
    public function withAllUsersBusyTimes(array $allUsersBusyTimes): self
    {
        $self = clone $this;
        $self['allUsersBusyTimes'] = $allUsersBusyTimes;

        return $self;
    }

    /**
     * @param ExternalLinkAvailability|ExternalLinkAvailabilityShape $linkAvailability
     */
    public function withLinkAvailability(
        ExternalLinkAvailability|array $linkAvailability
    ): self {
        $self = clone $this;
        $self['linkAvailability'] = $linkAvailability;

        return $self;
    }
}
