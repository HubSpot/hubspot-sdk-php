<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Update webhook settings for the specified app.
 *
 * @see HubspotSDK\Webhooks->configure
 *
 * @phpstan-type webhook_configure_params = array{
 *   targetURL: string, throttling: ThrottlingSettings
 * }
 */
final class WebhookConfigureParams implements BaseModel
{
    /** @use SdkModel<webhook_configure_params> */
    use SdkModel;
    use SdkParams;

    /**
     * A publicly available URL for HubSpot to call where event payloads will be delivered.
     */
    #[Api('targetUrl')]
    public string $targetURL;

    /**
     * Configuration details for webhook throttling.
     */
    #[Api]
    public ThrottlingSettings $throttling;

    /**
     * `new WebhookConfigureParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WebhookConfigureParams::with(targetURL: ..., throttling: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WebhookConfigureParams)->withTargetURL(...)->withThrottling(...)
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
        string $targetURL,
        ThrottlingSettings $throttling
    ): self {
        $obj = new self;

        $obj->targetURL = $targetURL;
        $obj->throttling = $throttling;

        return $obj;
    }

    /**
     * A publicly available URL for HubSpot to call where event payloads will be delivered.
     */
    public function withTargetURL(string $targetURL): self
    {
        $obj = clone $this;
        $obj->targetURL = $targetURL;

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
