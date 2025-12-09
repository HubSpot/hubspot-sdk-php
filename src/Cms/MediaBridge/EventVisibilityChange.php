<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Cms\MediaBridge\EventVisibilityChange\EventType;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type EventVisibilityChangeShape = array{
 *   eventType: value-of<EventType>,
 *   updatedAt: int,
 *   showInReporting?: bool|null,
 *   showInTimeline?: bool|null,
 *   showInWorkflows?: bool|null,
 * }
 */
final class EventVisibilityChange implements BaseModel
{
    /** @use SdkModel<EventVisibilityChangeShape> */
    use SdkModel;

    /** @var value-of<EventType> $eventType */
    #[Required(enum: EventType::class)]
    public string $eventType;

    #[Required]
    public int $updatedAt;

    #[Optional]
    public ?bool $showInReporting;

    #[Optional]
    public ?bool $showInTimeline;

    #[Optional]
    public ?bool $showInWorkflows;

    /**
     * `new EventVisibilityChange()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EventVisibilityChange::with(eventType: ..., updatedAt: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EventVisibilityChange)->withEventType(...)->withUpdatedAt(...)
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
     * @param EventType|value-of<EventType> $eventType
     */
    public static function with(
        EventType|string $eventType,
        int $updatedAt,
        ?bool $showInReporting = null,
        ?bool $showInTimeline = null,
        ?bool $showInWorkflows = null,
    ): self {
        $obj = new self;

        $obj['eventType'] = $eventType;
        $obj['updatedAt'] = $updatedAt;

        null !== $showInReporting && $obj['showInReporting'] = $showInReporting;
        null !== $showInTimeline && $obj['showInTimeline'] = $showInTimeline;
        null !== $showInWorkflows && $obj['showInWorkflows'] = $showInWorkflows;

        return $obj;
    }

    /**
     * @param EventType|value-of<EventType> $eventType
     */
    public function withEventType(EventType|string $eventType): self
    {
        $obj = clone $this;
        $obj['eventType'] = $eventType;

        return $obj;
    }

    public function withUpdatedAt(int $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    public function withShowInReporting(bool $showInReporting): self
    {
        $obj = clone $this;
        $obj['showInReporting'] = $showInReporting;

        return $obj;
    }

    public function withShowInTimeline(bool $showInTimeline): self
    {
        $obj = clone $this;
        $obj['showInTimeline'] = $showInTimeline;

        return $obj;
    }

    public function withShowInWorkflows(bool $showInWorkflows): self
    {
        $obj = clone $this;
        $obj['showInWorkflows'] = $showInWorkflows;

        return $obj;
    }
}
