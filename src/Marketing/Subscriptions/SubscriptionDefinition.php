<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
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
 * }
 */
final class SubscriptionDefinition implements BaseModel
{
    /** @use SdkModel<SubscriptionDefinitionShape> */
    use SdkModel;

    /**
     * The ID of the definition.
     */
    #[Required]
    public string $id;

    /**
     * Time at which the definition was created.
     */
    #[Required]
    public \DateTimeInterface $createdAt;

    /**
     * A description of the subscription.
     */
    #[Required]
    public string $description;

    /**
     * Whether the definition is active or archived.
     */
    #[Required]
    public bool $isActive;

    /**
     * A subscription definition created by HubSpot.
     */
    #[Required]
    public bool $isDefault;

    /**
     * A default description that is used by some HubSpot tools and cannot be edited.
     */
    #[Required]
    public bool $isInternal;

    /**
     * The name of the subscription.
     */
    #[Required]
    public string $name;

    /**
     * Time at which the definition was last updated.
     */
    #[Required]
    public \DateTimeInterface $updatedAt;

    /**
     * The ID of the business unit associated with the subscription definition.
     */
    #[Optional('businessUnitId')]
    public ?int $businessUnitID;

    /**
     * The method or technology used to contact.
     */
    #[Optional]
    public ?string $communicationMethod;

    /**
     * The purpose of this subscription or the department in your organization that uses it.
     */
    #[Optional]
    public ?string $purpose;

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

        return $self;
    }

    /**
     * The ID of the definition.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Time at which the definition was created.
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
     * Whether the definition is active or archived.
     */
    public function withIsActive(bool $isActive): self
    {
        $self = clone $this;
        $self['isActive'] = $isActive;

        return $self;
    }

    /**
     * A subscription definition created by HubSpot.
     */
    public function withIsDefault(bool $isDefault): self
    {
        $self = clone $this;
        $self['isDefault'] = $isDefault;

        return $self;
    }

    /**
     * A default description that is used by some HubSpot tools and cannot be edited.
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
     * Time at which the definition was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * The ID of the business unit associated with the subscription definition.
     */
    public function withBusinessUnitID(int $businessUnitID): self
    {
        $self = clone $this;
        $self['businessUnitID'] = $businessUnitID;

        return $self;
    }

    /**
     * The method or technology used to contact.
     */
    public function withCommunicationMethod(string $communicationMethod): self
    {
        $self = clone $this;
        $self['communicationMethod'] = $communicationMethod;

        return $self;
    }

    /**
     * The purpose of this subscription or the department in your organization that uses it.
     */
    public function withPurpose(string $purpose): self
    {
        $self = clone $this;
        $self['purpose'] = $purpose;

        return $self;
    }
}
