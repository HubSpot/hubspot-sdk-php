<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V4\Links;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Subscriptions\V4\Links\LinkCreateParams\Channel;

/**
 * @see HubspotSDK\Marketing\Subscriptions\V4\Links->create
 *
 * @phpstan-type link_create_params = array{
 *   channel: Channel|value-of<Channel>,
 *   subscriberIDString: string,
 *   businessUnitID?: int,
 *   language?: string,
 *   subscriptionID?: int,
 * }
 */
final class LinkCreateParams implements BaseModel
{
    /** @use SdkModel<link_create_params> */
    use SdkModel;
    use SdkParams;

    /** @var value-of<Channel> $channel */
    #[Api(enum: Channel::class)]
    public string $channel;

    #[Api('subscriberIdString')]
    public string $subscriberIDString;

    #[Api(optional: true)]
    public ?int $businessUnitID;

    #[Api(optional: true)]
    public ?string $language;

    #[Api('subscriptionId', optional: true)]
    public ?int $subscriptionID;

    /**
     * `new LinkCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LinkCreateParams::with(channel: ..., subscriberIDString: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LinkCreateParams)->withChannel(...)->withSubscriberIDString(...)
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
     * @param Channel|value-of<Channel> $channel
     */
    public static function with(
        Channel|string $channel,
        string $subscriberIDString,
        ?int $businessUnitID = null,
        ?string $language = null,
        ?int $subscriptionID = null,
    ): self {
        $obj = new self;

        $obj['channel'] = $channel;
        $obj->subscriberIDString = $subscriberIDString;

        null !== $businessUnitID && $obj->businessUnitID = $businessUnitID;
        null !== $language && $obj->language = $language;
        null !== $subscriptionID && $obj->subscriptionID = $subscriptionID;

        return $obj;
    }

    /**
     * @param Channel|value-of<Channel> $channel
     */
    public function withChannel(Channel|string $channel): self
    {
        $obj = clone $this;
        $obj['channel'] = $channel;

        return $obj;
    }

    public function withSubscriberIDString(string $subscriberIDString): self
    {
        $obj = clone $this;
        $obj->subscriberIDString = $subscriberIDString;

        return $obj;
    }

    public function withBusinessUnitID(int $businessUnitID): self
    {
        $obj = clone $this;
        $obj->businessUnitID = $businessUnitID;

        return $obj;
    }

    public function withLanguage(string $language): self
    {
        $obj = clone $this;
        $obj->language = $language;

        return $obj;
    }

    public function withSubscriptionID(int $subscriptionID): self
    {
        $obj = clone $this;
        $obj->subscriptionID = $subscriptionID;

        return $obj;
    }
}
