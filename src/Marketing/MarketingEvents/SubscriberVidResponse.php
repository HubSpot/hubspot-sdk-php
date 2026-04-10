<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\MarketingEvents;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type SubscriberVidResponseShape = array{vid: int}
 */
final class SubscriberVidResponse implements BaseModel
{
    /** @use SdkModel<SubscriberVidResponseShape> */
    use SdkModel;

    /**
     * The internal ID of the contact.
     */
    #[Required]
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
        $self = new self;

        $self['vid'] = $vid;

        return $self;
    }

    /**
     * The internal ID of the contact.
     */
    public function withVid(int $vid): self
    {
        $self = clone $this;
        $self['vid'] = $vid;

        return $self;
    }
}
