<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\ListOf;
use HubspotSDK\Core\Conversion\MapOf;

/**
 * Represents a CRM object along with its properties, timestamps, and a set of associated object IDs grouped by association type.
 *
 * @phpstan-type simple_public_object_with_associations = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   properties: array<string, string>,
 *   updatedAt: \DateTimeInterface,
 *   archived?: bool,
 *   archivedAt?: \DateTimeInterface,
 *   associations?: array<string, CollectionResponseAssociatedID>,
 *   objectWriteTraceID?: string,
 *   propertiesWithHistory?: array<string, list<ValueWithTimestamp>>,
 * }
 */
final class SimplePublicObjectWithAssociations implements BaseModel
{
    /** @use SdkModel<simple_public_object_with_associations> */
    use SdkModel;

    /**
     * The unique ID of the object.
     */
    #[Api]
    public string $id;

    /**
     * The timestamp when the object was created, in ISO 8601 format.
     */
    #[Api]
    public \DateTimeInterface $createdAt;

    /**
     * Key value pairs representing the properties of the object.
     *
     * @var array<string, string> $properties
     */
    #[Api(type: new MapOf('string', nullable: true))]
    public array $properties;

    /**
     * The timestamp when the object was last updated, in ISO 8601 format.
     */
    #[Api]
    public \DateTimeInterface $updatedAt;

    /**
     * Whether the object is archived.
     */
    #[Api(optional: true)]
    public ?bool $archived;

    /**
     * The timestamp when the object was archived, in ISO 8601 format.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $archivedAt;

    /**
     * A list defining relationships with other objects.
     *
     * @var array<string, CollectionResponseAssociatedID>|null $associations
     */
    #[Api(map: CollectionResponseAssociatedID::class, optional: true)]
    public ?array $associations;

    #[Api('objectWriteTraceId', optional: true)]
    public ?string $objectWriteTraceID;

    /**
     * Key-value pairs representing the properties of the object along with their history.
     *
     * @var array<string, list<ValueWithTimestamp>>|null $propertiesWithHistory
     */
    #[Api(map: new ListOf(ValueWithTimestamp::class), optional: true)]
    public ?array $propertiesWithHistory;

    /**
     * `new SimplePublicObjectWithAssociations()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SimplePublicObjectWithAssociations::with(
     *   id: ..., createdAt: ..., properties: ..., updatedAt: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SimplePublicObjectWithAssociations)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withProperties(...)
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
     * @param array<string, string> $properties
     * @param array<string, CollectionResponseAssociatedID> $associations
     * @param array<string, list<ValueWithTimestamp>> $propertiesWithHistory
     */
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        array $properties,
        \DateTimeInterface $updatedAt,
        ?bool $archived = null,
        ?\DateTimeInterface $archivedAt = null,
        ?array $associations = null,
        ?string $objectWriteTraceID = null,
        ?array $propertiesWithHistory = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->createdAt = $createdAt;
        $obj->properties = $properties;
        $obj->updatedAt = $updatedAt;

        null !== $archived && $obj->archived = $archived;
        null !== $archivedAt && $obj->archivedAt = $archivedAt;
        null !== $associations && $obj->associations = $associations;
        null !== $objectWriteTraceID && $obj->objectWriteTraceID = $objectWriteTraceID;
        null !== $propertiesWithHistory && $obj->propertiesWithHistory = $propertiesWithHistory;

        return $obj;
    }

    /**
     * The unique ID of the object.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The timestamp when the object was created, in ISO 8601 format.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * Key value pairs representing the properties of the object.
     *
     * @param array<string, string> $properties
     */
    public function withProperties(array $properties): self
    {
        $obj = clone $this;
        $obj->properties = $properties;

        return $obj;
    }

    /**
     * The timestamp when the object was last updated, in ISO 8601 format.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * Whether the object is archived.
     */
    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    /**
     * The timestamp when the object was archived, in ISO 8601 format.
     */
    public function withArchivedAt(\DateTimeInterface $archivedAt): self
    {
        $obj = clone $this;
        $obj->archivedAt = $archivedAt;

        return $obj;
    }

    /**
     * A list defining relationships with other objects.
     *
     * @param array<string, CollectionResponseAssociatedID> $associations
     */
    public function withAssociations(array $associations): self
    {
        $obj = clone $this;
        $obj->associations = $associations;

        return $obj;
    }

    public function withObjectWriteTraceID(string $objectWriteTraceID): self
    {
        $obj = clone $this;
        $obj->objectWriteTraceID = $objectWriteTraceID;

        return $obj;
    }

    /**
     * Key-value pairs representing the properties of the object along with their history.
     *
     * @param array<string, list<ValueWithTimestamp>> $propertiesWithHistory
     */
    public function withPropertiesWithHistory(
        array $propertiesWithHistory
    ): self {
        $obj = clone $this;
        $obj->propertiesWithHistory = $propertiesWithHistory;

        return $obj;
    }
}
