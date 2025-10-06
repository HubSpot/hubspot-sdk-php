<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type subscription_definition = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   isActive: bool,
 *   isDefault: bool,
 *   isInternal: bool,
 *   name: string,
 *   updatedAt: \DateTimeInterface,
 *   businessUnitID?: int,
 *   communicationMethod?: string,
 *   purpose?: string,
 * }
 */
final class SubscriptionDefinition implements BaseModel
{
    /** @use SdkModel<subscription_definition> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public \DateTimeInterface $createdAt;

    #[Api]
    public bool $isActive;

    #[Api]
    public bool $isDefault;

    #[Api]
    public bool $isInternal;

    #[Api]
    public string $name;

    #[Api]
    public \DateTimeInterface $updatedAt;

    #[Api('businessUnitId', optional: true)]
    public ?int $businessUnitID;

    #[Api(optional: true)]
    public ?string $communicationMethod;

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
        bool $isActive,
        bool $isDefault,
        bool $isInternal,
        string $name,
        \DateTimeInterface $updatedAt,
        ?int $businessUnitID = null,
        ?string $communicationMethod = null,
        ?string $purpose = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->createdAt = $createdAt;
        $obj->isActive = $isActive;
        $obj->isDefault = $isDefault;
        $obj->isInternal = $isInternal;
        $obj->name = $name;
        $obj->updatedAt = $updatedAt;

        null !== $businessUnitID && $obj->businessUnitID = $businessUnitID;
        null !== $communicationMethod && $obj->communicationMethod = $communicationMethod;
        null !== $purpose && $obj->purpose = $purpose;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    public function withIsActive(bool $isActive): self
    {
        $obj = clone $this;
        $obj->isActive = $isActive;

        return $obj;
    }

    public function withIsDefault(bool $isDefault): self
    {
        $obj = clone $this;
        $obj->isDefault = $isDefault;

        return $obj;
    }

    public function withIsInternal(bool $isInternal): self
    {
        $obj = clone $this;
        $obj->isInternal = $isInternal;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withBusinessUnitID(int $businessUnitID): self
    {
        $obj = clone $this;
        $obj->businessUnitID = $businessUnitID;

        return $obj;
    }

    public function withCommunicationMethod(string $communicationMethod): self
    {
        $obj = clone $this;
        $obj->communicationMethod = $communicationMethod;

        return $obj;
    }

    public function withPurpose(string $purpose): self
    {
        $obj = clone $this;
        $obj->purpose = $purpose;

        return $obj;
    }
}
