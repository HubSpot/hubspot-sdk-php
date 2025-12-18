<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks\Settings;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Webhooks\ThrottlingSettings;

/**
 * Update webhook settings for the specified app.
 *
 * @see HubspotSDK\Services\Webhooks\SettingsService::update()
 *
 * @phpstan-import-type ThrottlingSettingsShape from \HubspotSDK\Webhooks\ThrottlingSettings
 *
 * @phpstan-type SettingUpdateParamsShape = array{
 *   targetURL: string, throttling: ThrottlingSettings|ThrottlingSettingsShape
 * }
 */
final class SettingUpdateParams implements BaseModel
{
    /** @use SdkModel<SettingUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A publicly available URL for HubSpot to call where event payloads will be delivered.
     */
    #[Required('targetUrl')]
    public string $targetURL;

    /**
     * Configuration details for webhook throttling.
     */
    #[Required]
    public ThrottlingSettings $throttling;

    /**
     * `new SettingUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SettingUpdateParams::with(targetURL: ..., throttling: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SettingUpdateParams)->withTargetURL(...)->withThrottling(...)
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
     * @param ThrottlingSettings|ThrottlingSettingsShape $throttling
     */
    public static function with(
        string $targetURL,
        ThrottlingSettings|array $throttling
    ): self {
        $self = new self;

        $self['targetURL'] = $targetURL;
        $self['throttling'] = $throttling;

        return $self;
    }

    /**
     * A publicly available URL for HubSpot to call where event payloads will be delivered.
     */
    public function withTargetURL(string $targetURL): self
    {
        $self = clone $this;
        $self['targetURL'] = $targetURL;

        return $self;
    }

    /**
     * Configuration details for webhook throttling.
     *
     * @param ThrottlingSettings|ThrottlingSettingsShape $throttling
     */
    public function withThrottling(ThrottlingSettings|array $throttling): self
    {
        $self = clone $this;
        $self['throttling'] = $throttling;

        return $self;
    }
}
