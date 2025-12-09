<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * The definition of an association.
 *
 * @phpstan-type AssociationDefinitionShape = array{
 *   id: string,
 *   fromObjectTypeId: string,
 *   toObjectTypeId: string,
 *   createdAt?: \DateTimeInterface|null,
 *   name?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class AssociationDefinition implements BaseModel
{
    /** @use SdkModel<AssociationDefinitionShape> */
    use SdkModel;

    /**
     * The unique ID of the associated object (e.g., a contact ID).
     */
    #[Required]
    public string $id;

    /**
     * The ID of the source object type (e.g., 0-1 for contacts).
     */
    #[Required]
    public string $fromObjectTypeId;

    /**
     * The ID of the destination object type (e.g., 0-3 for deals).
     */
    #[Required]
    public string $toObjectTypeId;

    /**
     * The timestamp when the association was created, in ISO 8601 format.
     */
    #[Optional]
    public ?\DateTimeInterface $createdAt;

    /**
     * For labeled association types, the internal name of the association.
     */
    #[Optional]
    public ?string $name;

    /**
     * The timestamp when the last update was made to an association, in ISO 8601 format.
     */
    #[Optional]
    public ?\DateTimeInterface $updatedAt;

    /**
     * `new AssociationDefinition()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociationDefinition::with(id: ..., fromObjectTypeId: ..., toObjectTypeId: ...)
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
        string $fromObjectTypeId,
        string $toObjectTypeId,
        ?\DateTimeInterface $createdAt = null,
        ?string $name = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['fromObjectTypeId'] = $fromObjectTypeId;
        $obj['toObjectTypeId'] = $toObjectTypeId;

        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $name && $obj['name'] = $name;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * The unique ID of the associated object (e.g., a contact ID).
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * The ID of the source object type (e.g., 0-1 for contacts).
     */
    public function withFromObjectTypeID(string $fromObjectTypeID): self
    {
        $obj = clone $this;
        $obj['fromObjectTypeId'] = $fromObjectTypeID;

        return $obj;
    }

    /**
     * The ID of the destination object type (e.g., 0-3 for deals).
     */
    public function withToObjectTypeID(string $toObjectTypeID): self
    {
        $obj = clone $this;
        $obj['toObjectTypeId'] = $toObjectTypeID;

        return $obj;
    }

    /**
     * The timestamp when the association was created, in ISO 8601 format.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * For labeled association types, the internal name of the association.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * The timestamp when the last update was made to an association, in ISO 8601 format.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }
}
