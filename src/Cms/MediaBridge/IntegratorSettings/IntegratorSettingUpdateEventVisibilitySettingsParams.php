<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\IntegratorSettings;

use HubspotSDK\Cms\MediaBridge\IntegratorSettings\IntegratorSettingUpdateEventVisibilitySettingsParams\EventType;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Set the visibility settings for media bridge events created by your app.
 *
 * @see HubspotSDK\Services\Cms\MediaBridge\IntegratorSettingsService::updateEventVisibilitySettings()
 *
 * @phpstan-type IntegratorSettingUpdateEventVisibilitySettingsParamsShape = array{
 *   eventType: EventType|value-of<EventType>,
 *   updatedAt: int,
 *   showInReporting?: bool|null,
 *   showInTimeline?: bool|null,
 *   showInWorkflows?: bool|null,
 * }
 */
final class IntegratorSettingUpdateEventVisibilitySettingsParams implements BaseModel
{
    /** @use SdkModel<IntegratorSettingUpdateEventVisibilitySettingsParamsShape> */
    use SdkModel;
    use SdkParams;

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
     * `new IntegratorSettingUpdateEventVisibilitySettingsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IntegratorSettingUpdateEventVisibilitySettingsParams::with(
     *   eventType: ..., updatedAt: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IntegratorSettingUpdateEventVisibilitySettingsParams)
     *   ->withEventType(...)
     *   ->withUpdatedAt(...)
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
        $self = new self;

        $self['eventType'] = $eventType;
        $self['updatedAt'] = $updatedAt;

        null !== $showInReporting && $self['showInReporting'] = $showInReporting;
        null !== $showInTimeline && $self['showInTimeline'] = $showInTimeline;
        null !== $showInWorkflows && $self['showInWorkflows'] = $showInWorkflows;

        return $self;
    }

    /**
     * @param EventType|value-of<EventType> $eventType
     */
    public function withEventType(EventType|string $eventType): self
    {
        $self = clone $this;
        $self['eventType'] = $eventType;

        return $self;
    }

    public function withUpdatedAt(int $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withShowInReporting(bool $showInReporting): self
    {
        $self = clone $this;
        $self['showInReporting'] = $showInReporting;

        return $self;
    }

    public function withShowInTimeline(bool $showInTimeline): self
    {
        $self = clone $this;
        $self['showInTimeline'] = $showInTimeline;

        return $self;
    }

    public function withShowInWorkflows(bool $showInWorkflows): self
    {
        $self = clone $this;
        $self['showInWorkflows'] = $showInWorkflows;

        return $self;
    }
}
