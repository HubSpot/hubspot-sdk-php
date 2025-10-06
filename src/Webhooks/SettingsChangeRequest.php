<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type settings_change_request = array{
 *   targetURL: string, throttling: ThrottlingSettings
 * }
 */
final class SettingsChangeRequest implements BaseModel
{
    /** @use SdkModel<settings_change_request> */
    use SdkModel;

    #[Api('targetUrl')]
    public string $targetURL;

    #[Api]
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

    public function withTargetURL(string $targetURL): self
    {
        $obj = clone $this;
        $obj->targetURL = $targetURL;

        return $obj;
    }

    public function withThrottling(ThrottlingSettings $throttling): self
    {
        $obj = clone $this;
        $obj->throttling = $throttling;

        return $obj;
    }
}
