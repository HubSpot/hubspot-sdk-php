<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Cms\MediaBridge\EventVisibilityChange\EventType;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type EventVisibilityResponseShape = array{
 *   createdAt: \DateTimeInterface, visibilitySettings: list<EventVisibilityChange>
 * }
 */
final class EventVisibilityResponse implements BaseModel
{
    /** @use SdkModel<EventVisibilityResponseShape> */
    use SdkModel;

    #[Required]
    public \DateTimeInterface $createdAt;

    /** @var list<EventVisibilityChange> $visibilitySettings */
    #[Required(list: EventVisibilityChange::class)]
    public array $visibilitySettings;

    /**
     * `new EventVisibilityResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EventVisibilityResponse::with(createdAt: ..., visibilitySettings: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EventVisibilityResponse)->withCreatedAt(...)->withVisibilitySettings(...)
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
     * @param list<EventVisibilityChange|array{
     *   eventType: value-of<EventType>,
     *   updatedAt: int,
     *   showInReporting?: bool|null,
     *   showInTimeline?: bool|null,
     *   showInWorkflows?: bool|null,
     * }> $visibilitySettings
     */
    public static function with(
        \DateTimeInterface $createdAt,
        array $visibilitySettings
    ): self {
        $obj = new self;

        $obj['createdAt'] = $createdAt;
        $obj['visibilitySettings'] = $visibilitySettings;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * @param list<EventVisibilityChange|array{
     *   eventType: value-of<EventType>,
     *   updatedAt: int,
     *   showInReporting?: bool|null,
     *   showInTimeline?: bool|null,
     *   showInWorkflows?: bool|null,
     * }> $visibilitySettings
     */
    public function withVisibilitySettings(array $visibilitySettings): self
    {
        $obj = clone $this;
        $obj['visibilitySettings'] = $visibilitySettings;

        return $obj;
    }
}
