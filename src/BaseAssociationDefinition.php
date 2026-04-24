<?php

declare(strict_types=1);

namespace HubSpotSDK;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * The definition of an association.
 *
 * @phpstan-type BaseAssociationDefinitionShape = array{
 *   id: string,
 *   fromObjectTypeID: string,
 *   toObjectTypeID: string,
 *   createdAt?: \DateTimeInterface|null,
 *   name?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class BaseAssociationDefinition implements BaseModel
{
    /** @use SdkModel<BaseAssociationDefinitionShape> */
    use SdkModel;

    /**
     * The unique ID of the associated object (e.g., a contact ID).
     */
    #[Required]
    public string $id;

    /**
     * The ID of the source object type (e.g., 0-1 for contacts).
     */
    #[Required('fromObjectTypeId')]
    public string $fromObjectTypeID;

    /**
     * The ID of the destination object type (e.g., 0-3 for deals).
     */
    #[Required('toObjectTypeId')]
    public string $toObjectTypeID;

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
     * `new BaseAssociationDefinition()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BaseAssociationDefinition::with(
     *   id: ..., fromObjectTypeID: ..., toObjectTypeID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BaseAssociationDefinition)
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
        $self = new self;

        $self['id'] = $id;
        $self['fromObjectTypeID'] = $fromObjectTypeID;
        $self['toObjectTypeID'] = $toObjectTypeID;

        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $name && $self['name'] = $name;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * The unique ID of the associated object (e.g., a contact ID).
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The ID of the source object type (e.g., 0-1 for contacts).
     */
    public function withFromObjectTypeID(string $fromObjectTypeID): self
    {
        $self = clone $this;
        $self['fromObjectTypeID'] = $fromObjectTypeID;

        return $self;
    }

    /**
     * The ID of the destination object type (e.g., 0-3 for deals).
     */
    public function withToObjectTypeID(string $toObjectTypeID): self
    {
        $self = clone $this;
        $self['toObjectTypeID'] = $toObjectTypeID;

        return $self;
    }

    /**
     * The timestamp when the association was created, in ISO 8601 format.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * For labeled association types, the internal name of the association.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The timestamp when the last update was made to an association, in ISO 8601 format.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
