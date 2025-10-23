<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects\Schemas;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Defines an association between two object types.
 *
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

    /**
     * A unique ID for this association.
     */
    #[Api]
    public string $id;

    /**
     * ID of the primary object type to link from.
     */
    #[Api('fromObjectTypeId')]
    public string $fromObjectTypeID;

    /**
     * ID of the target object type to link to.
     */
    #[Api('toObjectTypeId')]
    public string $toObjectTypeID;

    /**
     * When the association was defined.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $createdAt;

    /**
     * A unique name for this association.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * When the association was last updated.
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
     * A unique ID for this association.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * ID of the primary object type to link from.
     */
    public function withFromObjectTypeID(string $fromObjectTypeID): self
    {
        $obj = clone $this;
        $obj->fromObjectTypeID = $fromObjectTypeID;

        return $obj;
    }

    /**
     * ID of the target object type to link to.
     */
    public function withToObjectTypeID(string $toObjectTypeID): self
    {
        $obj = clone $this;
        $obj->toObjectTypeID = $toObjectTypeID;

        return $obj;
    }

    /**
     * When the association was defined.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * A unique name for this association.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * When the association was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
