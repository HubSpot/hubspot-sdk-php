<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type EventDetailSettingsShape = array{
 *   appId: int, eventDetailsUrl: string
 * }
 */
final class EventDetailSettings implements BaseModel
{
    /** @use SdkModel<EventDetailSettingsShape> */
    use SdkModel;

    /**
     * The id of the application the settings are for.
     */
    #[Api]
    public int $appId;

    /**
     * The url that will be used to fetch marketing event details by id.
     */
    #[Api]
    public string $eventDetailsUrl;

    /**
     * `new EventDetailSettings()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EventDetailSettings::with(appId: ..., eventDetailsUrl: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EventDetailSettings)->withAppID(...)->withEventDetailsURL(...)
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
     */
    public static function with(int $appId, string $eventDetailsUrl): self
    {
        $obj = new self;

        $obj['appId'] = $appId;
        $obj['eventDetailsUrl'] = $eventDetailsUrl;

        return $obj;
    }

    /**
     * The id of the application the settings are for.
     */
    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj['appId'] = $appID;

        return $obj;
    }

    /**
     * The url that will be used to fetch marketing event details by id.
     */
    public function withEventDetailsURL(string $eventDetailsURL): self
    {
        $obj = clone $this;
        $obj['eventDetailsUrl'] = $eventDetailsURL;

        return $obj;
    }
}
