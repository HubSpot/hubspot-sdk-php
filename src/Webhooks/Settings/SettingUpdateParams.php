<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks\Settings;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Webhooks\ThrottlingSettings;

/**
 * Update webhook settings for the specified app.
 *
 * @see HubspotSDK\Webhooks\Settings->update
 *
 * @phpstan-type SettingUpdateParamsShape = array{
 *   targetUrl: string, throttling: ThrottlingSettings
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
    #[Api]
    public string $targetUrl;

    /**
     * Configuration details for webhook throttling.
     */
    #[Api]
    public ThrottlingSettings $throttling;

    /**
     * `new SettingUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SettingUpdateParams::with(targetUrl: ..., throttling: ...)
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
     */
    public static function with(
        string $targetUrl,
        ThrottlingSettings $throttling
    ): self {
        $obj = new self;

        $obj->targetUrl = $targetUrl;
        $obj->throttling = $throttling;

        return $obj;
    }

    /**
     * A publicly available URL for HubSpot to call where event payloads will be delivered.
     */
    public function withTargetURL(string $targetURL): self
    {
        $obj = clone $this;
        $obj->targetUrl = $targetURL;

        return $obj;
    }

    /**
     * Configuration details for webhook throttling.
     */
    public function withThrottling(ThrottlingSettings $throttling): self
    {
        $obj = clone $this;
        $obj->throttling = $throttling;

        return $obj;
    }
}
