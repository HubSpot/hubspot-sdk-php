<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events\Settings;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Create or update the current settings for the application.
 *
 * @see HubspotSDK\Marketing\Events\Settings->createOrUpdate
 *
 * @phpstan-type setting_create_or_update_params = array{eventDetailsURL: string}
 */
final class SettingCreateOrUpdateParams implements BaseModel
{
    /** @use SdkModel<setting_create_or_update_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The url that will be used to fetch marketing event details by id. Must contain a `%s` character sequence that will be substituted with the event id. For example: `https://my.event.app/events/%s`.
     */
    #[Api('eventDetailsUrl')]
    public string $eventDetailsURL;

    /**
     * `new SettingCreateOrUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SettingCreateOrUpdateParams::with(eventDetailsURL: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SettingCreateOrUpdateParams)->withEventDetailsURL(...)
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
