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
 *   showInReporting?: bool,
 *   showInTimeline?: bool,
 *   showInWorkflows?: bool,
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
