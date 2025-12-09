<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V4;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type LinkGenerationResponseShape = array{
 *   managePreferencesUrl: string,
 *   subscriberIdString: string,
 *   unsubscribeAllUrl: string,
 *   unsubscribeSingleUrl?: string|null,
 * }
 */
final class LinkGenerationResponse implements BaseModel
{
    /** @use SdkModel<LinkGenerationResponseShape> */
    use SdkModel;

    #[Required]
    public string $managePreferencesUrl;

    #[Required]
    public string $subscriberIdString;

    #[Required]
    public string $unsubscribeAllUrl;

    #[Optional]
    public ?string $unsubscribeSingleUrl;

    /**
     * `new LinkGenerationResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LinkGenerationResponse::with(
     *   managePreferencesUrl: ..., subscriberIdString: ..., unsubscribeAllUrl: ...
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
        string $managePreferencesUrl,
        string $subscriberIdString,
        string $unsubscribeAllUrl,
        ?string $unsubscribeSingleUrl = null,
    ): self {
        $obj = new self;

        $obj['managePreferencesUrl'] = $managePreferencesUrl;
        $obj['subscriberIdString'] = $subscriberIdString;
        $obj['unsubscribeAllUrl'] = $unsubscribeAllUrl;

        null !== $unsubscribeSingleUrl && $obj['unsubscribeSingleUrl'] = $unsubscribeSingleUrl;

        return $obj;
    }

    public function withManagePreferencesURL(string $managePreferencesURL): self
    {
        $obj = clone $this;
        $obj['managePreferencesUrl'] = $managePreferencesURL;

        return $obj;
    }

    public function withSubscriberIDString(string $subscriberIDString): self
    {
        $obj = clone $this;
        $obj['subscriberIdString'] = $subscriberIDString;

        return $obj;
    }

    public function withUnsubscribeAllURL(string $unsubscribeAllURL): self
    {
        $obj = clone $this;
        $obj['unsubscribeAllUrl'] = $unsubscribeAllURL;

        return $obj;
    }

    public function withUnsubscribeSingleURL(string $unsubscribeSingleURL): self
    {
        $obj = clone $this;
        $obj['unsubscribeSingleUrl'] = $unsubscribeSingleURL;

        return $obj;
    }
}
