<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new WebhookConfigureParams); // set properties as needed
 * $client->webhooks->configure(...$params->toArray());
 * ```
 * Update webhook settings.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->webhooks->configure(...$params->toArray());`
 *
 * @see HubspotSDK\Webhooks->configure
 *
 * @phpstan-type webhook_configure_params = array{
 *   targetURL: string, throttling: WebhooksThrottlingSettings
 * }
 */
final class WebhookConfigureParams implements BaseModel
{
    /** @use SdkModel<webhook_configure_params> */
    use SdkModel;
    use SdkParams;

    #[Api('targetUrl')]
    public string $targetURL;

    #[Api]
    public WebhooksThrottlingSettings $throttling;

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
        WebhooksThrottlingSettings $throttling
    ): self {
        $obj = new self;

        $obj->targetURL = $targetURL;
        $obj->throttling = $throttling;

        return $obj;
    }

    public function withTargetURL(string $targetURL): self
    {
        $obj = clone $this;
        $obj->targetURL = $targetURL;

        return $obj;
    }

    public function withThrottling(WebhooksThrottlingSettings $throttling): self
    {
        $obj = clone $this;
        $obj->throttling = $throttling;

        return $obj;
    }
}
