<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events\Settings;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Marketing\Events\SettingsService::createOrUpdate()
 *
 * @phpstan-type SettingCreateOrUpdateParamsShape = array{eventDetailsURL: string}
 */
final class SettingCreateOrUpdateParams implements BaseModel
{
    /** @use SdkModel<SettingCreateOrUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The url that will be used to fetch marketing event details by id. Must contain a `%s` character sequence that will be substituted with the event id. For example: `https://my.event.app/events/%s`.
     */
    #[Required('eventDetailsUrl')]
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
        $self = new self;

        $self['eventDetailsURL'] = $eventDetailsURL;

        return $self;
    }

    /**
     * The url that will be used to fetch marketing event details by id. Must contain a `%s` character sequence that will be substituted with the event id. For example: `https://my.event.app/events/%s`.
     */
    public function withEventDetailsURL(string $eventDetailsURL): self
    {
        $self = clone $this;
        $self['eventDetailsURL'] = $eventDetailsURL;

        return $self;
    }
}
