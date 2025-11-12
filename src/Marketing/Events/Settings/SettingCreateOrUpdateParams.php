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
 * @phpstan-type SettingCreateOrUpdateParamsShape = array{eventDetailsUrl: string}
 */
final class SettingCreateOrUpdateParams implements BaseModel
{
    /** @use SdkModel<SettingCreateOrUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The url that will be used to fetch marketing event details by id. Must contain a `%s` character sequence that will be substituted with the event id. For example: `https://my.event.app/events/%s`.
     */
    #[Api]
    public string $eventDetailsUrl;

    /**
     * `new SettingCreateOrUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SettingCreateOrUpdateParams::with(eventDetailsUrl: ...)
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
    public static function with(string $eventDetailsUrl): self
    {
        $obj = new self;

        $obj->eventDetailsUrl = $eventDetailsUrl;

        return $obj;
    }

    /**
     * The url that will be used to fetch marketing event details by id. Must contain a `%s` character sequence that will be substituted with the event id. For example: `https://my.event.app/events/%s`.
     */
    public function withEventDetailsURL(string $eventDetailsURL): self
    {
        $obj = clone $this;
        $obj->eventDetailsUrl = $eventDetailsURL;

        return $obj;
    }
}
