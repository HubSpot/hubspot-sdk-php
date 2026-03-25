<?php

declare(strict_types=1);

namespace HubspotSDK\AppWebhooks;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ThrottlingSettingsShape = array{maxConcurrentRequests: int}
 */
final class ThrottlingSettings implements BaseModel
{
    /** @use SdkModel<ThrottlingSettingsShape> */
    use SdkModel;

    /**
     * The maximum number of concurrent HTTP requests HubSpot will attempt to make to your app.
     */
    #[Required]
    public int $maxConcurrentRequests;

    /**
     * `new ThrottlingSettings()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ThrottlingSettings::with(maxConcurrentRequests: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ThrottlingSettings)->withMaxConcurrentRequests(...)
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
    public static function with(int $maxConcurrentRequests): self
    {
        $self = new self;

        $self['maxConcurrentRequests'] = $maxConcurrentRequests;

        return $self;
    }

    /**
     * The maximum number of concurrent HTTP requests HubSpot will attempt to make to your app.
     */
    public function withMaxConcurrentRequests(int $maxConcurrentRequests): self
    {
        $self = clone $this;
        $self['maxConcurrentRequests'] = $maxConcurrentRequests;

        return $self;
    }
}
