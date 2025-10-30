<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * The definition of an association.
 *
 * @phpstan-type AssociationDefinitionShape = array{
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
    /** @use SdkModel<AssociationDefinitionShape> */
    use SdkModel;

    /**
     * The unique ID of the associated object (e.g., a contact ID).
     */
    #[Api]
    public string $id;

    /**
     * The ID of the source object type (e.g., 0-1 for contacts).
     */
    #[Api('fromObjectTypeId')]
    public string $fromObjectTypeID;

    /**
     * The ID of the destination object type (e.g., 0-3 for deals).
     */
    #[Api('toObjectTypeId')]
    public string $toObjectTypeID;

    /**
     * The timestamp when the association was created, in ISO 8601 format.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $createdAt;

    /**
     * For labeled association types, the internal name of the association.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * The timestamp when the last update was made to an association, in ISO 8601 format.
     */
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

    /**
     * The unique ID of the associated object (e.g., a contact ID).
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The ID of the source object type (e.g., 0-1 for contacts).
     */
    public function withFromObjectTypeID(string $fromObjectTypeID): self
    {
        $obj = clone $this;
        $obj->fromObjectTypeID = $fromObjectTypeID;

        return $obj;
    }

    /**
     * The ID of the destination object type (e.g., 0-3 for deals).
     */
    public function withToObjectTypeID(string $toObjectTypeID): self
    {
        $obj = clone $this;
        $obj->toObjectTypeID = $toObjectTypeID;

        return $obj;
    }

    /**
     * The timestamp when the association was created, in ISO 8601 format.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * For labeled association types, the internal name of the association.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * The timestamp when the last update was made to an association, in ISO 8601 format.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
