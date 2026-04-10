<?php

declare(strict_types=1);

namespace HubSpotSDK\Scheduler\Meetings;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ExternalLinkAvailabilityForDurationShape from \HubSpotSDK\Scheduler\Meetings\ExternalLinkAvailabilityForDuration
 *
 * @phpstan-type ExternalLinkAvailabilityShape = array{
 *   hasMore: bool,
 *   linkAvailabilityByDuration: array<string,ExternalLinkAvailabilityForDuration|ExternalLinkAvailabilityForDurationShape>,
 * }
 */
final class ExternalLinkAvailability implements BaseModel
{
    /** @use SdkModel<ExternalLinkAvailabilityShape> */
    use SdkModel;

    /**
     * Whether there are more available meeting times beyond the returned set.
     */
    #[Required]
    public bool $hasMore;

    /**
     * Available booking slots for the meeting, grouped by the duration.
     *
     * @var array<string,ExternalLinkAvailabilityForDuration> $linkAvailabilityByDuration
     */
    #[Required(map: ExternalLinkAvailabilityForDuration::class)]
    public array $linkAvailabilityByDuration;

    /**
     * `new ExternalLinkAvailability()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExternalLinkAvailability::with(hasMore: ..., linkAvailabilityByDuration: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExternalLinkAvailability)
     *   ->withHasMore(...)
     *   ->withLinkAvailabilityByDuration(...)
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
     * @param array<string,ExternalLinkAvailabilityForDuration|ExternalLinkAvailabilityForDurationShape> $linkAvailabilityByDuration
     */
    public static function with(
        bool $hasMore,
        array $linkAvailabilityByDuration
    ): self {
        $self = new self;

        $self['hasMore'] = $hasMore;
        $self['linkAvailabilityByDuration'] = $linkAvailabilityByDuration;

        return $self;
    }

    /**
     * Whether there are more available meeting times beyond the returned set.
     */
    public function withHasMore(bool $hasMore): self
    {
        $self = clone $this;
        $self['hasMore'] = $hasMore;

        return $self;
    }

    /**
     * Available booking slots for the meeting, grouped by the duration.
     *
     * @param array<string,ExternalLinkAvailabilityForDuration|ExternalLinkAvailabilityForDurationShape> $linkAvailabilityByDuration
     */
    public function withLinkAvailabilityByDuration(
        array $linkAvailabilityByDuration
    ): self {
        $self = clone $this;
        $self['linkAvailabilityByDuration'] = $linkAvailabilityByDuration;

        return $self;
    }
}
