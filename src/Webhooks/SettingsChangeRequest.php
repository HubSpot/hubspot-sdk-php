<?php

declare(strict_types=1);

namespace HubSpotSDK\Webhooks;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ThrottlingSettingsShape from \HubSpotSDK\Webhooks\ThrottlingSettings
 *
 * @phpstan-type SettingsChangeRequestShape = array{
 *   targetURL: string, throttling: ThrottlingSettings|ThrottlingSettingsShape
 * }
 */
final class SettingsChangeRequest implements BaseModel
{
    /** @use SdkModel<SettingsChangeRequestShape> */
    use SdkModel;

    /**
     * A publicly available URL for Hubspot to call where event payloads will be delivered. See [link-so-some-doc](#) for details about the format of these event payloads.
     */
    #[Required('targetUrl')]
    public string $targetURL;

    #[Required]
    public ThrottlingSettings $throttling;

    /**
     * `new SettingsChangeRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SettingsChangeRequest::with(targetURL: ..., throttling: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SettingsChangeRequest)->withTargetURL(...)->withThrottling(...)
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
