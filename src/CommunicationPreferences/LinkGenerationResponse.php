<?php

declare(strict_types=1);

namespace HubspotSDK\CommunicationPreferences;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type LinkGenerationResponseShape = array{
 *   managePreferencesURL: string,
 *   subscriberIDString: string,
 *   unsubscribeAllURL: string,
 *   unsubscribeSingleURL?: string|null,
 * }
 */
final class LinkGenerationResponse implements BaseModel
{
    /** @use SdkModel<LinkGenerationResponseShape> */
    use SdkModel;

    /**
     * The URL where the subscriber can manage their communication preferences.
     */
    #[Required('managePreferencesUrl')]
    public string $managePreferencesURL;

    /**
     * A string representing the unique identifier of the subscriber.
     */
    #[Required('subscriberIdString')]
    public string $subscriberIDString;

    /**
     * A string containing the URL for unsubscribing the subscriber from all communications.
     */
    #[Required('unsubscribeAllUrl')]
    public string $unsubscribeAllURL;

    /**
     * A string containing the URL to unsubscribe the subscriber from a single communication.
     */
    #[Optional('unsubscribeSingleUrl')]
    public ?string $unsubscribeSingleURL;

    /**
     * `new LinkGenerationResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LinkGenerationResponse::with(
     *   managePreferencesURL: ..., subscriberIDString: ..., unsubscribeAllURL: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LinkGenerationResponse)
     *   ->withManagePreferencesURL(...)
     *   ->withSubscriberIDString(...)
     *   ->withUnsubscribeAllURL(...)
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
        string $managePreferencesURL,
        string $subscriberIDString,
        string $unsubscribeAllURL,
        ?string $unsubscribeSingleURL = null,
    ): self {
        $self = new self;

        $self['managePreferencesURL'] = $managePreferencesURL;
        $self['subscriberIDString'] = $subscriberIDString;
        $self['unsubscribeAllURL'] = $unsubscribeAllURL;

        null !== $unsubscribeSingleURL && $self['unsubscribeSingleURL'] = $unsubscribeSingleURL;

        return $self;
    }

    /**
     * The URL where the subscriber can manage their communication preferences.
     */
    public function withManagePreferencesURL(string $managePreferencesURL): self
    {
        $self = clone $this;
        $self['managePreferencesURL'] = $managePreferencesURL;

        return $self;
    }

    /**
     * A string representing the unique identifier of the subscriber.
     */
    public function withSubscriberIDString(string $subscriberIDString): self
    {
        $self = clone $this;
        $self['subscriberIDString'] = $subscriberIDString;

        return $self;
    }

    /**
     * A string containing the URL for unsubscribing the subscriber from all communications.
     */
    public function withUnsubscribeAllURL(string $unsubscribeAllURL): self
    {
        $self = clone $this;
        $self['unsubscribeAllURL'] = $unsubscribeAllURL;

        return $self;
    }

    /**
     * A string containing the URL to unsubscribe the subscriber from a single communication.
     */
    public function withUnsubscribeSingleURL(string $unsubscribeSingleURL): self
    {
        $self = clone $this;
        $self['unsubscribeSingleURL'] = $unsubscribeSingleURL;

        return $self;
    }
}
