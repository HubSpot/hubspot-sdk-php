<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type EventVisibilityChangeShape from \HubspotSDK\Cms\MediaBridge\EventVisibilityChange
 *
 * @phpstan-type EventVisibilityResponseShape = array{
 *   createdAt: \DateTimeInterface,
 *   visibilitySettings: list<EventVisibilityChangeShape>,
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
     * @param list<EventVisibilityChangeShape> $visibilitySettings
     */
    public static function with(
        \DateTimeInterface $createdAt,
        array $visibilitySettings
    ): self {
        $self = new self;

        $self['createdAt'] = $createdAt;
        $self['visibilitySettings'] = $visibilitySettings;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * @param list<EventVisibilityChangeShape> $visibilitySettings
     */
    public function withVisibilitySettings(array $visibilitySettings): self
    {
        $self = clone $this;
        $self['visibilitySettings'] = $visibilitySettings;

        return $self;
    }
}
