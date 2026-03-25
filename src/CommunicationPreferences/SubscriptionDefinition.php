<?php

declare(strict_types=1);

namespace HubspotSDK\CommunicationPreferences;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicSubscriptionTranslationShape from \HubspotSDK\CommunicationPreferences\PublicSubscriptionTranslation
 *
 * @phpstan-type SubscriptionDefinitionShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   description: string,
 *   isActive: bool,
 *   isDefault: bool,
 *   isInternal: bool,
 *   name: string,
 *   updatedAt: \DateTimeInterface,
 *   businessUnitID?: int|null,
 *   communicationMethod?: string|null,
 *   purpose?: string|null,
 *   subscriptionTranslations?: list<PublicSubscriptionTranslation|PublicSubscriptionTranslationShape>|null,
 * }
 */
final class SubscriptionDefinition implements BaseModel
{
    /** @use SdkModel<SubscriptionDefinitionShape> */
    use SdkModel;

    /**
     * The unique identifier for the subscription.
     */
    #[Required]
    public string $id;

    /**
     * The date and time when the subscription was created.
     */
    #[Required]
    public \DateTimeInterface $createdAt;

    /**
     * A description of the subscription.
     */
    #[Required]
    public string $description;

    /**
     * Indicates whether the subscription is active.
     */
    #[Required]
    public bool $isActive;

    /**
     * Indicates whether the subscription is the default option.
     */
    #[Required]
    public bool $isDefault;

    /**
     * Indicates whether the subscription is internal.
     */
    #[Required]
    public bool $isInternal;

    /**
     * The name of the subscription.
     */
    #[Required]
    public string $name;

    /**
     * The date and time when the subscription was last updated.
     */
    #[Required]
    public \DateTimeInterface $updatedAt;

    /**
     * The ID of the business unit associated with the subscription.
     */
    #[Optional('businessUnitId')]
    public ?int $businessUnitID;

    /**
     * The method of communication for the subscription.
     */
    #[Optional]
    public ?string $communicationMethod;

    /**
     * The purpose of the subscription.
     */
    #[Optional]
    public ?string $purpose;

    /**
     * A list of translations associated with the subscription.
     *
     * @var list<PublicSubscriptionTranslation>|null $subscriptionTranslations
     */
    #[Optional(list: PublicSubscriptionTranslation::class)]
    public ?array $subscriptionTranslations;

    /**
     * `new SubscriptionDefinition()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SubscriptionDefinition::with(
     *   id: ...,
     *   createdAt: ...,
     *   description: ...,
     *   isActive: ...,
     *   isDefault: ...,
     *   isInternal: ...,
     *   name: ...,
     *   updatedAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SubscriptionDefinition)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withDescription(...)
     *   ->withIsActive(...)
     *   ->withIsDefault(...)
     *   ->withIsInternal(...)
     *   ->withName(...)
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
     *
     * @param list<PublicSubscriptionTranslation|PublicSubscriptionTranslationShape>|null $subscriptionTranslations
     */
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        string $description,
        bool $isActive,
        bool $isDefault,
        bool $isInternal,
        string $name,
        \DateTimeInterface $updatedAt,
        ?int $businessUnitID = null,
        ?string $communicationMethod = null,
        ?string $purpose = null,
        ?array $subscriptionTranslations = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;
        $self['description'] = $description;
        $self['isActive'] = $isActive;
        $self['isDefault'] = $isDefault;
        $self['isInternal'] = $isInternal;
        $self['name'] = $name;
        $self['updatedAt'] = $updatedAt;

        null !== $businessUnitID && $self['businessUnitID'] = $businessUnitID;
        null !== $communicationMethod && $self['communicationMethod'] = $communicationMethod;
        null !== $purpose && $self['purpose'] = $purpose;
        null !== $subscriptionTranslations && $self['subscriptionTranslations'] = $subscriptionTranslations;

        return $self;
    }

    /**
     * The unique identifier for the subscription.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The date and time when the subscription was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * A description of the subscription.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * Indicates whether the subscription is active.
     */
    public function withIsActive(bool $isActive): self
    {
        $self = clone $this;
        $self['isActive'] = $isActive;

        return $self;
    }

    /**
     * Indicates whether the subscription is the default option.
     */
    public function withIsDefault(bool $isDefault): self
    {
        $self = clone $this;
        $self['isDefault'] = $isDefault;

        return $self;
    }

    /**
     * Indicates whether the subscription is internal.
     */
    public function withIsInternal(bool $isInternal): self
    {
        $self = clone $this;
        $self['isInternal'] = $isInternal;

        return $self;
    }

    /**
     * The name of the subscription.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The date and time when the subscription was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * The ID of the business unit associated with the subscription.
     */
    public function withBusinessUnitID(int $businessUnitID): self
    {
        $self = clone $this;
        $self['businessUnitID'] = $businessUnitID;

        return $self;
    }

    /**
     * The method of communication for the subscription.
     */
    public function withCommunicationMethod(string $communicationMethod): self
    {
        $self = clone $this;
        $self['communicationMethod'] = $communicationMethod;

        return $self;
    }

    /**
     * The purpose of the subscription.
     */
    public function withPurpose(string $purpose): self
    {
        $self = clone $this;
        $self['purpose'] = $purpose;

        return $self;
    }

    /**
     * A list of translations associated with the subscription.
     *
     * @param list<PublicSubscriptionTranslation|PublicSubscriptionTranslationShape> $subscriptionTranslations
     */
    public function withSubscriptionTranslations(
        array $subscriptionTranslations
    ): self {
        $self = clone $this;
        $self['subscriptionTranslations'] = $subscriptionTranslations;

        return $self;
    }
}
