<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ExternalLinkAvailabilityShape = array{
 *   hasMore: bool,
 *   linkAvailabilityByDuration: array<string,
 *   ExternalLinkAvailabilityForDuration,>,
 * }
 */
final class ExternalLinkAvailability implements BaseModel
{
    /** @use SdkModel<ExternalLinkAvailabilityShape> */
    use SdkModel;

    #[Api]
    public bool $hasMore;

    /**
     * @var array<string,
     * ExternalLinkAvailabilityForDuration,> $linkAvailabilityByDuration
     */
    #[Api(map: ExternalLinkAvailabilityForDuration::class)]
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
     * @param array<string,
     * ExternalLinkAvailabilityForDuration,> $linkAvailabilityByDuration
     */
    public static function with(
        bool $hasMore,
        array $linkAvailabilityByDuration
    ): self {
        $obj = new self;

        $obj->hasMore = $hasMore;
        $obj->linkAvailabilityByDuration = $linkAvailabilityByDuration;

        return $obj;
    }

    public function withHasMore(bool $hasMore): self
    {
        $obj = clone $this;
        $obj->hasMore = $hasMore;

        return $obj;
    }

    /**
     * @param array<string,
     * ExternalLinkAvailabilityForDuration,> $linkAvailabilityByDuration
     */
    public function withLinkAvailabilityByDuration(
        array $linkAvailabilityByDuration
    ): self {
        $obj = clone $this;
        $obj->linkAvailabilityByDuration = $linkAvailabilityByDuration;

        return $obj;
    }
}
