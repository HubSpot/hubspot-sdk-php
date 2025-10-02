<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type marketing_subscriptions_public_subscription_translation = array{
 *   createdAt: int,
 *   languageCode: string,
 *   name: string,
 *   subscriptionID: int,
 *   updatedAt: int,
 * }
 */
final class MarketingSubscriptionsPublicSubscriptionTranslation implements BaseModel
{
    /** @use SdkModel<marketing_subscriptions_public_subscription_translation> */
    use SdkModel;

    #[Api]
    public int $createdAt;

    #[Api]
    public string $languageCode;

    #[Api]
    public string $name;

    #[Api('subscriptionId')]
    public int $subscriptionID;

    #[Api]
    public int $updatedAt;

    /**
     * `new MarketingSubscriptionsPublicSubscriptionTranslation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MarketingSubscriptionsPublicSubscriptionTranslation::with(
     *   createdAt: ...,
     *   languageCode: ...,
     *   name: ...,
     *   subscriptionID: ...,
     *   updatedAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MarketingSubscriptionsPublicSubscriptionTranslation)
     *   ->withCreatedAt(...)
     *   ->withLanguageCode(...)
     *   ->withName(...)
     *   ->withSubscriptionID(...)
     *   ->withUpdatedAt(...)
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
        int $createdAt,
        string $languageCode,
        string $name,
        int $subscriptionID,
        int $updatedAt,
    ): self {
        $obj = new self;

        $obj->createdAt = $createdAt;
        $obj->languageCode = $languageCode;
        $obj->name = $name;
        $obj->subscriptionID = $subscriptionID;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withCreatedAt(int $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    public function withLanguageCode(string $languageCode): self
    {
        $obj = clone $this;
        $obj->languageCode = $languageCode;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withSubscriptionID(int $subscriptionID): self
    {
        $obj = clone $this;
        $obj->subscriptionID = $subscriptionID;

        return $obj;
    }

    public function withUpdatedAt(int $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
