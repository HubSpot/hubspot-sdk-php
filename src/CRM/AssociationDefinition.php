<?php

declare(strict_types=1);

namespace HubspotSDK\CRM;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type association_definition = array{
 *   id: string,
 *   fromObjectTypeID: string,
 *   toObjectTypeID: string,
 *   createdAt?: \DateTimeInterface,
 *   name?: string,
 *   updatedAt?: \DateTimeInterface,
 * }
 */
final class AssociationDefinition implements BaseModel
{
    /** @use SdkModel<association_definition> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api('fromObjectTypeId')]
    public string $fromObjectTypeID;

    #[Api('toObjectTypeId')]
    public string $toObjectTypeID;

    #[Api(optional: true)]
    public ?\DateTimeInterface $createdAt;

    #[Api(optional: true)]
    public ?string $name;

    #[Api(optional: true)]
    public ?\DateTimeInterface $updatedAt;

    /**
     * `new AssociationDefinition()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociationDefinition::with(id: ..., fromObjectTypeID: ..., toObjectTypeID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssociationDefinition)
     *   ->withID(...)
     *   ->withFromObjectTypeID(...)
     *   ->withToObjectTypeID(...)
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
        string $fromObjectTypeID,
        string $toObjectTypeID,
        ?\DateTimeInterface $createdAt = null,
        ?string $name = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->fromObjectTypeID = $fromObjectTypeID;
        $obj->toObjectTypeID = $toObjectTypeID;

        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $name && $obj->name = $name;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withFromObjectTypeID(string $fromObjectTypeID): self
    {
        $obj = clone $this;
        $obj->fromObjectTypeID = $fromObjectTypeID;

        return $obj;
    }

    public function withToObjectTypeID(string $toObjectTypeID): self
    {
        $obj = clone $this;
        $obj->toObjectTypeID = $toObjectTypeID;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

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
}
