<?php

declare(strict_types=1);

namespace HubSpotSDK\Webhooks;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ThrottlingSettingsShape = array{maxConcurrentRequests: int}
 */
final class ThrottlingSettings implements BaseModel
{
    /** @use SdkModel<ThrottlingSettingsShape> */
    use SdkModel;

    /**
     * The maximum number of concurrent requests allowed. This is an integer value.
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
     * The maximum number of concurrent requests allowed. This is an integer value.
     */
    public function withMaxConcurrentRequests(int $maxConcurrentRequests): self
    {
        $self = clone $this;
        $self['maxConcurrentRequests'] = $maxConcurrentRequests;

        return $self;
    }
}
