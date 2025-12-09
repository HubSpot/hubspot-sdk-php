<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V4;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicSubscriptionTranslationShape = array{
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
    /** @use SdkModel<PublicSubscriptionTranslationShape> */
    use SdkModel;

    /**
     * The timestamp indicating when the subscription translation was created.
     */
    #[Required]
    public int $createdAt;

    /**
     * A text description of the subscription translation.
     */
    #[Required]
    public string $description;

    /**
     * The code representing the language of the subscription translation.
     */
    #[Required]
    public string $languageCode;

    /**
     * The name of the subscription translation.
     */
    #[Required]
    public string $name;

    /**
     * The unique identifier for the subscription associated with the translation.
     */
    #[Required('subscriptionId')]
    public int $subscriptionID;

    /**
     * The timestamp indicating when the subscription translation was last updated.
     */
    #[Required]
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
        $self = new self;

        $self['createdAt'] = $createdAt;
        $self['description'] = $description;
        $self['languageCode'] = $languageCode;
        $self['name'] = $name;
        $self['subscriptionID'] = $subscriptionID;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * The timestamp indicating when the subscription translation was created.
     */
    public function withCreatedAt(int $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * A text description of the subscription translation.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * The code representing the language of the subscription translation.
     */
    public function withLanguageCode(string $languageCode): self
    {
        $self = clone $this;
        $self['languageCode'] = $languageCode;

        return $self;
    }

    /**
     * The name of the subscription translation.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The unique identifier for the subscription associated with the translation.
     */
    public function withSubscriptionID(int $subscriptionID): self
    {
        $self = clone $this;
        $self['subscriptionID'] = $subscriptionID;

        return $self;
    }

    /**
     * The timestamp indicating when the subscription translation was last updated.
     */
    public function withUpdatedAt(int $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
