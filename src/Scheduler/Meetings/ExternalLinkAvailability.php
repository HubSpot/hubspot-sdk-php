<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ExternalLinkAvailabilityForDurationShape from \HubspotSDK\Scheduler\Meetings\ExternalLinkAvailabilityForDuration
 *
 * @phpstan-type ExternalLinkAvailabilityShape = array{
 *   hasMore: bool,
 *   linkAvailabilityByDuration: array<string,ExternalLinkAvailabilityForDurationShape>,
 * }
 */
final class ExternalLinkAvailability implements BaseModel
{
    /** @use SdkModel<ExternalLinkAvailabilityShape> */
    use SdkModel;

    #[Required]
    public bool $hasMore;

    /**
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
     * @param array<string,ExternalLinkAvailabilityForDurationShape> $linkAvailabilityByDuration
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

    public function withHasMore(bool $hasMore): self
    {
        $self = clone $this;
        $self['hasMore'] = $hasMore;

        return $self;
    }

    /**
     * @param array<string,ExternalLinkAvailabilityForDurationShape> $linkAvailabilityByDuration
     */
    public function withLinkAvailabilityByDuration(
        array $linkAvailabilityByDuration
    ): self {
        $self = clone $this;
        $self['linkAvailabilityByDuration'] = $linkAvailabilityByDuration;

        return $self;
    }
}
