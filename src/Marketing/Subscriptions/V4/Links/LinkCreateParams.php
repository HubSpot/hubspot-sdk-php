<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V4\Links;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Subscriptions\V4\Links\LinkCreateParams\Channel;

/**
 * @see HubspotSDK\Services\Marketing\Subscriptions\V4\LinksService::create()
 *
 * @phpstan-type LinkCreateParamsShape = array{
 *   channel: Channel|value-of<Channel>,
 *   subscriberIDString: string,
 *   businessUnitID?: int,
 *   language?: string,
 *   subscriptionID?: int,
 * }
 */
final class LinkCreateParams implements BaseModel
{
    /** @use SdkModel<LinkCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var value-of<Channel> $channel */
    #[Required(enum: Channel::class)]
    public string $channel;

    #[Required('subscriberIdString')]
    public string $subscriberIDString;

    #[Optional]
    public ?int $businessUnitID;

    #[Optional]
    public ?string $language;

    #[Optional('subscriptionId')]
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
        $obj['subscriberIDString'] = $subscriberIDString;

        null !== $businessUnitID && $obj['businessUnitID'] = $businessUnitID;
        null !== $language && $obj['language'] = $language;
        null !== $subscriptionID && $obj['subscriptionID'] = $subscriptionID;

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
        $obj['subscriberIDString'] = $subscriberIDString;

        return $obj;
    }

    public function withBusinessUnitID(int $businessUnitID): self
    {
        $obj = clone $this;
        $obj['businessUnitID'] = $businessUnitID;

        return $obj;
    }

    public function withLanguage(string $language): self
    {
        $obj = clone $this;
        $obj['language'] = $language;

        return $obj;
    }

    public function withSubscriptionID(int $subscriptionID): self
    {
        $obj = clone $this;
        $obj['subscriptionID'] = $subscriptionID;

        return $obj;
    }
}
