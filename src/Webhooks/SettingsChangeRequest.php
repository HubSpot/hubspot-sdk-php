<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * New or updated webhook settings for an app.
 *
 * @phpstan-type SettingsChangeRequestShape = array{
 *   targetUrl: string, throttling: ThrottlingSettings
 * }
 */
final class SettingsChangeRequest implements BaseModel
{
    /** @use SdkModel<SettingsChangeRequestShape> */
    use SdkModel;

    /**
     * A publicly available URL for HubSpot to call where event payloads will be delivered.
     */
    #[Required]
    public string $targetUrl;

    /**
     * Configuration details for webhook throttling.
     */
    #[Required]
    public ThrottlingSettings $throttling;

    /**
     * `new SettingsChangeRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SettingsChangeRequest::with(targetUrl: ..., throttling: ...)
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
     * @param ThrottlingSettings|array{maxConcurrentRequests: int} $throttling
     */
    public static function with(
        string $targetUrl,
        ThrottlingSettings|array $throttling
    ): self {
        $obj = new self;

        $obj['targetUrl'] = $targetUrl;
        $obj['throttling'] = $throttling;

        return $obj;
    }

    /**
     * A publicly available URL for HubSpot to call where event payloads will be delivered.
     */
    public function withTargetURL(string $targetURL): self
    {
        $obj = clone $this;
        $obj['targetUrl'] = $targetURL;

        return $obj;
    }

    /**
     * Configuration details for webhook throttling.
     *
     * @param ThrottlingSettings|array{maxConcurrentRequests: int} $throttling
     */
    public function withThrottling(ThrottlingSettings|array $throttling): self
    {
        $obj = clone $this;
        $obj['throttling'] = $throttling;

        return $obj;
    }
}
