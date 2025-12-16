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
 *   businessUnitID?: int|null,
 *   language?: string|null,
 *   subscriptionID?: int|null,
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
        $self = new self;

        $self['channel'] = $channel;
        $self['subscriberIDString'] = $subscriberIDString;

        null !== $businessUnitID && $self['businessUnitID'] = $businessUnitID;
        null !== $language && $self['language'] = $language;
        null !== $subscriptionID && $self['subscriptionID'] = $subscriptionID;

        return $self;
    }

    /**
     * @param Channel|value-of<Channel> $channel
     */
    public function withChannel(Channel|string $channel): self
    {
        $self = clone $this;
        $self['channel'] = $channel;

        return $self;
    }

    public function withSubscriberIDString(string $subscriberIDString): self
    {
        $self = clone $this;
        $self['subscriberIDString'] = $subscriberIDString;

        return $self;
    }

    public function withBusinessUnitID(int $businessUnitID): self
    {
        $self = clone $this;
        $self['businessUnitID'] = $businessUnitID;

        return $self;
    }

    public function withLanguage(string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    public function withSubscriptionID(int $subscriptionID): self
    {
        $self = clone $this;
        $self['subscriptionID'] = $subscriptionID;

        return $self;
    }
}
