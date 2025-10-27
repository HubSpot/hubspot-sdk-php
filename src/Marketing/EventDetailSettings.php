<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type event_detail_settings = array{appID: int, eventDetailsURL: string}
 */
final class EventDetailSettings implements BaseModel
{
    /** @use SdkModel<event_detail_settings> */
    use SdkModel;

    /**
     * The id of the application the settings are for.
     */
    #[Api('appId')]
    public int $appID;

    /**
     * The url that will be used to fetch marketing event details by id.
     */
    #[Api('eventDetailsUrl')]
    public string $eventDetailsURL;

    /**
     * `new EventDetailSettings()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EventDetailSettings::with(appID: ..., eventDetailsURL: ...)
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
    public static function with(int $appID, string $eventDetailsURL): self
    {
        $obj = new self;

        $obj->appID = $appID;
        $obj->eventDetailsURL = $eventDetailsURL;

        return $obj;
    }

    /**
     * The id of the application the settings are for.
     */
    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj->appID = $appID;

        return $obj;
    }

    /**
     * The url that will be used to fetch marketing event details by id.
     */
    public function withEventDetailsURL(string $eventDetailsURL): self
    {
        $obj = clone $this;
        $obj->eventDetailsURL = $eventDetailsURL;

        return $obj;
    }
}
