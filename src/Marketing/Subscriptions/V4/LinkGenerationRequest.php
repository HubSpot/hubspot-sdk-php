<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V4;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type LinkGenerationRequestShape = array{
 *   subscriberIdString: string, language?: string|null, subscriptionId?: int|null
 * }
 */
final class LinkGenerationRequest implements BaseModel
{
    /** @use SdkModel<LinkGenerationRequestShape> */
    use SdkModel;

    #[Required]
    public string $subscriberIdString;

    #[Optional]
    public ?string $language;

    #[Optional]
    public ?int $subscriptionId;

    /**
     * `new LinkGenerationRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LinkGenerationRequest::with(subscriberIdString: ...)
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
        string $subscriberIdString,
        ?string $language = null,
        ?int $subscriptionId = null,
    ): self {
        $obj = new self;

        $obj['subscriberIdString'] = $subscriberIdString;

        null !== $language && $obj['language'] = $language;
        null !== $subscriptionId && $obj['subscriptionId'] = $subscriptionId;

        return $obj;
    }

    public function withSubscriberIDString(string $subscriberIDString): self
    {
        $obj = clone $this;
        $obj['subscriberIdString'] = $subscriberIDString;

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
        $obj['subscriptionId'] = $subscriptionID;

        return $obj;
    }
}
