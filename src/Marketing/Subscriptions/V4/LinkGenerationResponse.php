<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V4;

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

    #[Required('managePreferencesUrl')]
    public string $managePreferencesURL;

    #[Required('subscriberIdString')]
    public string $subscriberIDString;

    #[Required('unsubscribeAllUrl')]
    public string $unsubscribeAllURL;

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

    public function withManagePreferencesURL(string $managePreferencesURL): self
    {
        $self = clone $this;
        $self['managePreferencesURL'] = $managePreferencesURL;

        return $self;
    }

    public function withSubscriberIDString(string $subscriberIDString): self
    {
        $self = clone $this;
        $self['subscriberIDString'] = $subscriberIDString;

        return $self;
    }

    public function withUnsubscribeAllURL(string $unsubscribeAllURL): self
    {
        $self = clone $this;
        $self['unsubscribeAllURL'] = $unsubscribeAllURL;

        return $self;
    }

    public function withUnsubscribeSingleURL(string $unsubscribeSingleURL): self
    {
        $self = clone $this;
        $self['unsubscribeSingleURL'] = $unsubscribeSingleURL;

        return $self;
    }
}
