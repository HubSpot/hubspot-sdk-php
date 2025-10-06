<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type throttling_settings = array{maxConcurrentRequests: int}
 */
final class ThrottlingSettings implements BaseModel
{
    /** @use SdkModel<throttling_settings> */
    use SdkModel;

    #[Api]
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
        $obj = new self;

        $obj->maxConcurrentRequests = $maxConcurrentRequests;

        return $obj;
    }

    public function withMaxConcurrentRequests(int $maxConcurrentRequests): self
    {
        $obj = clone $this;
        $obj->maxConcurrentRequests = $maxConcurrentRequests;

        return $obj;
    }
}
