<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V4;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type LinkGenerationResponseShape = array{
 *   managePreferencesURL: string,
 *   subscriberIDString: string,
 *   unsubscribeAllURL: string,
 *   unsubscribeSingleURL?: string,
 * }
 */
final class LinkGenerationResponse implements BaseModel
{
    /** @use SdkModel<LinkGenerationResponseShape> */
    use SdkModel;

    #[Api('managePreferencesUrl')]
    public string $managePreferencesURL;

    #[Api('subscriberIdString')]
    public string $subscriberIDString;

    #[Api('unsubscribeAllUrl')]
    public string $unsubscribeAllURL;

    #[Api('unsubscribeSingleUrl', optional: true)]
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
        $obj = new self;

        $obj->managePreferencesURL = $managePreferencesURL;
        $obj->subscriberIDString = $subscriberIDString;
        $obj->unsubscribeAllURL = $unsubscribeAllURL;

        null !== $unsubscribeSingleURL && $obj->unsubscribeSingleURL = $unsubscribeSingleURL;

        return $obj;
    }

    public function withManagePreferencesURL(string $managePreferencesURL): self
    {
        $obj = clone $this;
        $obj->managePreferencesURL = $managePreferencesURL;

        return $obj;
    }

    public function withSubscriberIDString(string $subscriberIDString): self
    {
        $obj = clone $this;
        $obj->subscriberIDString = $subscriberIDString;

        return $obj;
    }

    public function withUnsubscribeAllURL(string $unsubscribeAllURL): self
    {
        $obj = clone $this;
        $obj->unsubscribeAllURL = $unsubscribeAllURL;

        return $obj;
    }

    public function withUnsubscribeSingleURL(string $unsubscribeSingleURL): self
    {
        $obj = clone $this;
        $obj->unsubscribeSingleURL = $unsubscribeSingleURL;

        return $obj;
    }
}
