<?php

declare(strict_types=1);

namespace HubspotSDK\AppWebhooks;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\AppWebhooksService::updateSettings()
 *
 * @phpstan-import-type ThrottlingSettingsShape from \HubspotSDK\AppWebhooks\ThrottlingSettings
 *
 * @phpstan-type AppWebhookUpdateSettingsParamsShape = array{
 *   targetURL: string, throttling: ThrottlingSettings|ThrottlingSettingsShape
 * }
 */
final class AppWebhookUpdateSettingsParams implements BaseModel
{
    /** @use SdkModel<AppWebhookUpdateSettingsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A publicly available URL for HubSpot to call where event payloads will be delivered.
     */
    #[Required('targetUrl')]
    public string $targetURL;

    #[Required]
    public ThrottlingSettings $throttling;

    /**
     * `new AppWebhookUpdateSettingsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AppWebhookUpdateSettingsParams::with(targetURL: ..., throttling: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AppWebhookUpdateSettingsParams)->withTargetURL(...)->withThrottling(...)
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
     * @param ThrottlingSettings|ThrottlingSettingsShape $throttling
     */
    public function withThrottling(ThrottlingSettings|array $throttling): self
    {
        $self = clone $this;
        $self['throttling'] = $throttling;

        return $self;
    }
}
