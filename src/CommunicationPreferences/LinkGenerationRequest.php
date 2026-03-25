<?php

declare(strict_types=1);

namespace HubspotSDK\CommunicationPreferences;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type LinkGenerationRequestShape = array{
 *   subscriberIDString: string, language?: string|null, subscriptionID?: int|null
 * }
 */
final class LinkGenerationRequest implements BaseModel
{
    /** @use SdkModel<LinkGenerationRequestShape> */
    use SdkModel;

    /**
     * A string representing the unique identifier of the subscriber. This property is required.
     */
    #[Required('subscriberIdString')]
    public string $subscriberIDString;

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
     * `new LinkGenerationRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LinkGenerationRequest::with(subscriberIDString: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LinkGenerationRequest)->withSubscriberIDString(...)
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
        string $subscriberIDString,
        ?string $language = null,
        ?int $subscriptionID = null,
    ): self {
        $self = new self;

        $self['subscriberIDString'] = $subscriberIDString;

        null !== $language && $self['language'] = $language;
        null !== $subscriptionID && $self['subscriptionID'] = $subscriptionID;

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
