<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V4;

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

    #[Required('subscriberIdString')]
    public string $subscriberIDString;

    #[Optional]
    public ?string $language;

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

    public function withSubscriberIDString(string $subscriberIDString): self
    {
        $self = clone $this;
        $self['subscriberIDString'] = $subscriberIDString;

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
