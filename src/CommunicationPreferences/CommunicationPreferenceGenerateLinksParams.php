<?php

declare(strict_types=1);

namespace HubspotSDK\CommunicationPreferences;

use HubspotSDK\CommunicationPreferences\CommunicationPreferenceGenerateLinksParams\Channel;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Generate communication preference links for a subscriber. This endpoint allows you to create URLs for managing preferences and unsubscribing, tailored to a specific subscriber. It is useful for integrating communication preference management into your applications.
 *
 * @see HubspotSDK\Services\CommunicationPreferencesService::generateLinks()
 *
 * @phpstan-type CommunicationPreferenceGenerateLinksParamsShape = array{
 *   channel: Channel|value-of<Channel>,
 *   subscriberIDString: string,
 *   businessUnitID?: int|null,
 *   language?: string|null,
 *   subscriptionID?: int|null,
 * }
 */
final class CommunicationPreferenceGenerateLinksParams implements BaseModel
{
    /** @use SdkModel<CommunicationPreferenceGenerateLinksParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var value-of<Channel> $channel */
    #[Required(enum: Channel::class)]
    public string $channel;

    /**
     * A string representing the unique identifier of the subscriber. This property is required.
     */
    #[Required('subscriberIdString')]
    public string $subscriberIDString;

    #[Optional]
    public ?int $businessUnitID;

    /**
     * The language in which the generated link should be presented, represented as a string.
     */
    #[Optional]
    public ?string $language;

    /**
     * The unique identifier for the subscription, represented as an integer in int64 format.
     */
    #[Optional('subscriptionId')]
    public ?int $subscriptionID;

    /**
     * `new CommunicationPreferenceGenerateLinksParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CommunicationPreferenceGenerateLinksParams::with(
     *   channel: ..., subscriberIDString: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CommunicationPreferenceGenerateLinksParams)
     *   ->withChannel(...)
     *   ->withSubscriberIDString(...)
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

    /**
     * A string representing the unique identifier of the subscriber. This property is required.
     */
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

    /**
     * The language in which the generated link should be presented, represented as a string.
     */
    public function withLanguage(string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    /**
     * The unique identifier for the subscription, represented as an integer in int64 format.
     */
    public function withSubscriptionID(int $subscriptionID): self
    {
        $self = clone $this;
        $self['subscriptionID'] = $subscriptionID;

        return $self;
    }
}
