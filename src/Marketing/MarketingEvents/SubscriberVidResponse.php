<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\MarketingEvents;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type subscriber_vid_response = array{vid: int}
 */
final class SubscriberVidResponse implements BaseModel
{
    /** @use SdkModel<subscriber_vid_response> */
    use SdkModel;

    #[Api]
    public int $vid;

    /**
     * `new SubscriberVidResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SubscriberVidResponse::with(vid: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SubscriberVidResponse)->withVid(...)
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
    public static function with(int $vid): self
    {
        $obj = new self;

        $obj->vid = $vid;

        return $obj;
    }

    public function withVid(int $vid): self
    {
        $obj = clone $this;
        $obj->vid = $vid;

        return $obj;
    }
}
