<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type event_detail_settings_url = array{eventDetailsURL: string}
 */
final class EventDetailSettingsURL implements BaseModel
{
    /** @use SdkModel<event_detail_settings_url> */
    use SdkModel;

    /**
     * The url that will be used to fetch marketing event details by id. Must contain a `%s` character sequence that will be substituted with the event id. For example: `https://my.event.app/events/%s`.
     */
    #[Api('eventDetailsUrl')]
    public string $eventDetailsURL;

    /**
     * `new EventDetailSettingsURL()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EventDetailSettingsURL::with(eventDetailsURL: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EventDetailSettingsURL)->withEventDetailsURL(...)
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
    public static function with(string $eventDetailsURL): self
    {
        $obj = new self;

        $obj->eventDetailsURL = $eventDetailsURL;

        return $obj;
    }

    /**
     * The url that will be used to fetch marketing event details by id. Must contain a `%s` character sequence that will be substituted with the event id. For example: `https://my.event.app/events/%s`.
     */
    public function withEventDetailsURL(string $eventDetailsURL): self
    {
        $obj = clone $this;
        $obj->eventDetailsURL = $eventDetailsURL;

        return $obj;
    }
}
