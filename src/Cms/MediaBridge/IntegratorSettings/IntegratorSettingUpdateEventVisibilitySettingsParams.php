<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\IntegratorSettings;

use HubspotSDK\Cms\MediaBridge\IntegratorSettings\IntegratorSettingUpdateEventVisibilitySettingsParams\EventType;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Set the visibility settings for media bridge events created by your app.
 *
 * @see HubspotSDK\Cms\MediaBridge\IntegratorSettings->updateEventVisibilitySettings
 *
 * @phpstan-type integrator_setting_update_event_visibility_settings_params = array{
 *   eventType: EventType|value-of<EventType>,
 *   updatedAt: int,
 *   showInReporting?: bool,
 *   showInTimeline?: bool,
 *   showInWorkflows?: bool,
 * }
 */
final class IntegratorSettingUpdateEventVisibilitySettingsParams implements BaseModel
{
    /** @use SdkModel<integrator_setting_update_event_visibility_settings_params> */
    use SdkModel;
    use SdkParams;

    /** @var value-of<EventType> $eventType */
    #[Api(enum: EventType::class)]
    public string $eventType;

    #[Api]
    public int $updatedAt;

    #[Api(optional: true)]
    public ?bool $showInReporting;

    #[Api(optional: true)]
    public ?bool $showInTimeline;

    #[Api(optional: true)]
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
        $obj = new self;

        $obj['eventType'] = $eventType;
        $obj->updatedAt = $updatedAt;

        null !== $showInReporting && $obj->showInReporting = $showInReporting;
        null !== $showInTimeline && $obj->showInTimeline = $showInTimeline;
        null !== $showInWorkflows && $obj->showInWorkflows = $showInWorkflows;

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
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withShowInReporting(bool $showInReporting): self
    {
        $obj = clone $this;
        $obj->showInReporting = $showInReporting;

        return $obj;
    }

    public function withShowInTimeline(bool $showInTimeline): self
    {
        $obj = clone $this;
        $obj->showInTimeline = $showInTimeline;

        return $obj;
    }

    public function withShowInWorkflows(bool $showInWorkflows): self
    {
        $obj = clone $this;
        $obj->showInWorkflows = $showInWorkflows;

        return $obj;
    }
}
