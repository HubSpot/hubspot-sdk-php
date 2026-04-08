<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Update webhook settings for the specified app.
 *
 * @see HubspotSDK\Services\WebhooksService::updateSettings()
 *
 * @phpstan-import-type ThrottlingSettingsShape from \HubspotSDK\Webhooks\ThrottlingSettings
 *
 * @phpstan-type WebhookUpdateSettingsParamsShape = array{
 *   targetURL: string, throttling: ThrottlingSettings|ThrottlingSettingsShape
 * }
 */
final class WebhookUpdateSettingsParams implements BaseModel
{
    /** @use SdkModel<WebhookUpdateSettingsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A publicly available URL for Hubspot to call where event payloads will be delivered. See [link-so-some-doc](#) for details about the format of these event payloads.
     */
    #[Required('targetUrl')]
    public string $targetURL;

    #[Required]
    public ThrottlingSettings $throttling;

    /**
     * `new WebhookUpdateSettingsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WebhookUpdateSettingsParams::with(targetURL: ..., throttling: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WebhookUpdateSettingsParams)->withTargetURL(...)->withThrottling(...)
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
     * A publicly available URL for Hubspot to call where event payloads will be delivered. See [link-so-some-doc](#) for details about the format of these event payloads.
     */
    public function withTargetURL(string $targetURL): self
    {
        $self = clone $this;
        $self['targetURL'] = $targetURL;

        return $self;
    }

    /**
     * @param ThrottlingSettings|ThrottlingSettingsShape $throttling
     */
    public function withThrottling(ThrottlingSettings|array $throttling): self
    {
        $self = clone $this;
        $self['throttling'] = $throttling;

        return $self;
    }
}
