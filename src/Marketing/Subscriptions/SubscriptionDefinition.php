<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions;

use HubspotSDK\Core\Attributes\Api;
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
 *   businessUnitId?: int|null,
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
    #[Api]
    public string $id;

    /**
     * Time at which the definition was created.
     */
    #[Api]
    public \DateTimeInterface $createdAt;

    /**
     * A description of the subscription.
     */
    #[Api]
    public string $description;

    /**
     * Whether the definition is active or archived.
     */
    #[Api]
    public bool $isActive;

    /**
     * A subscription definition created by HubSpot.
     */
    #[Api]
    public bool $isDefault;

    /**
     * A default description that is used by some HubSpot tools and cannot be edited.
     */
    #[Api]
    public bool $isInternal;

    /**
     * The name of the subscription.
     */
    #[Api]
    public string $name;

    /**
     * Time at which the definition was last updated.
     */
    #[Api]
    public \DateTimeInterface $updatedAt;

    /**
     * The ID of the business unit associated with the subscription definition.
     */
    #[Api(optional: true)]
    public ?int $businessUnitId;

    /**
     * The method or technology used to contact.
     */
    #[Api(optional: true)]
    public ?string $communicationMethod;

    /**
     * The purpose of this subscription or the department in your organization that uses it.
     */
    #[Api(optional: true)]
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
        ?int $businessUnitId = null,
        ?string $communicationMethod = null,
        ?string $purpose = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->createdAt = $createdAt;
        $obj->description = $description;
        $obj->isActive = $isActive;
        $obj->isDefault = $isDefault;
        $obj->isInternal = $isInternal;
        $obj->name = $name;
        $obj->updatedAt = $updatedAt;

        null !== $businessUnitId && $obj->businessUnitId = $businessUnitId;
        null !== $communicationMethod && $obj->communicationMethod = $communicationMethod;
        null !== $purpose && $obj->purpose = $purpose;

        return $obj;
    }

    /**
     * The ID of the definition.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Time at which the definition was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * A description of the subscription.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    /**
     * Whether the definition is active or archived.
     */
    public function withIsActive(bool $isActive): self
    {
        $obj = clone $this;
        $obj->isActive = $isActive;

        return $obj;
    }

    /**
     * A subscription definition created by HubSpot.
     */
    public function withIsDefault(bool $isDefault): self
    {
        $obj = clone $this;
        $obj->isDefault = $isDefault;

        return $obj;
    }

    /**
     * A default description that is used by some HubSpot tools and cannot be edited.
     */
    public function withIsInternal(bool $isInternal): self
    {
        $obj = clone $this;
        $obj->isInternal = $isInternal;

        return $obj;
    }

    /**
     * The name of the subscription.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * Time at which the definition was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * The ID of the business unit associated with the subscription definition.
     */
    public function withBusinessUnitID(int $businessUnitID): self
    {
        $obj = clone $this;
        $obj->businessUnitId = $businessUnitID;

        return $obj;
    }

    /**
     * The method or technology used to contact.
     */
    public function withCommunicationMethod(string $communicationMethod): self
    {
        $obj = clone $this;
        $obj->communicationMethod = $communicationMethod;

        return $obj;
    }

    /**
     * The purpose of this subscription or the department in your organization that uses it.
     */
    public function withPurpose(string $purpose): self
    {
        $obj = clone $this;
        $obj->purpose = $purpose;

        return $obj;
    }
}
