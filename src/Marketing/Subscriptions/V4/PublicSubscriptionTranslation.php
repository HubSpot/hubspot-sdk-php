<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V4;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type public_subscription_translation = array{
 *   createdAt: int,
 *   description: string,
 *   languageCode: string,
 *   name: string,
 *   subscriptionID: int,
 *   updatedAt: int,
 * }
 */
final class PublicSubscriptionTranslation implements BaseModel
{
    /** @use SdkModel<public_subscription_translation> */
    use SdkModel;

    #[Api]
    public int $createdAt;

    #[Api]
    public string $description;

    #[Api]
    public string $languageCode;

    #[Api]
    public string $name;

    #[Api('subscriptionId')]
    public int $subscriptionID;

    #[Api]
    public int $updatedAt;

    /**
     * `new PublicSubscriptionTranslation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicSubscriptionTranslation::with(
     *   createdAt: ...,
     *   description: ...,
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
     * (new PublicSubscriptionTranslation)
     *   ->withCreatedAt(...)
     *   ->withDescription(...)
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
        string $description,
        string $languageCode,
        string $name,
        int $subscriptionID,
        int $updatedAt,
    ): self {
        $obj = new self;

        $obj->createdAt = $createdAt;
        $obj->description = $description;
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

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

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
