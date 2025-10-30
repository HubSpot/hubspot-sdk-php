<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V4;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type LinkGenerationRequestShape = array{
 *   subscriberIDString: string, language?: string, subscriptionID?: int
 * }
 */
final class LinkGenerationRequest implements BaseModel
{
    /** @use SdkModel<LinkGenerationRequestShape> */
    use SdkModel;

    #[Api('subscriberIdString')]
    public string $subscriberIDString;

    #[Api(optional: true)]
    public ?string $language;

    #[Api('subscriptionId', optional: true)]
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
        $obj = new self;

        $obj->subscriberIDString = $subscriberIDString;

        null !== $language && $obj->language = $language;
        null !== $subscriptionID && $obj->subscriptionID = $subscriptionID;

        return $obj;
    }

    public function withSubscriberIDString(string $subscriberIDString): self
    {
        $obj = clone $this;
        $obj->subscriberIDString = $subscriberIDString;

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
