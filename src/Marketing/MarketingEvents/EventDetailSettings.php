<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\MarketingEvents;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type EventDetailSettingsShape = array{
 *   appID: int, eventDetailsURL: string
 * }
 */
final class EventDetailSettings implements BaseModel
{
    /** @use SdkModel<EventDetailSettingsShape> */
    use SdkModel;

    /**
     * The id of the application the settings are for.
     */
    #[Required('appId')]
    public int $appID;

    /**
     * The url that will be used to fetch marketing event details by id.
     */
    #[Required('eventDetailsUrl')]
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
        $self = new self;

        $self['appID'] = $appID;
        $self['eventDetailsURL'] = $eventDetailsURL;

        return $self;
    }

    /**
     * The id of the application the settings are for.
     */
    public function withAppID(int $appID): self
    {
        $self = clone $this;
        $self['appID'] = $appID;

        return $self;
    }

    /**
     * The url that will be used to fetch marketing event details by id.
     */
    public function withEventDetailsURL(string $eventDetailsURL): self
    {
        $self = clone $this;
        $self['eventDetailsURL'] = $eventDetailsURL;

        return $self;
    }
}
