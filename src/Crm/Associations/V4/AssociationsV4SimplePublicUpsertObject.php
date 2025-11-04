<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\V4;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\ListOf;
use HubspotSDK\Crm\ValueWithTimestamp;

/**
 * Represents a CRM object that has either been created or updated (upserted).
 *
 * @phpstan-type AssociationsV4SimplePublicUpsertObjectShape = array{
 *   id: string,
 *   archived: bool,
 *   createdAt: \DateTimeInterface,
 *   new: bool,
 *   properties: array<string, string>,
 *   updatedAt: \DateTimeInterface,
 *   archivedAt?: \DateTimeInterface,
 *   objectWriteTraceID?: string,
 *   propertiesWithHistory?: array<string, list<ValueWithTimestamp>>,
 * }
 */
final class AssociationsV4SimplePublicUpsertObject implements BaseModel
{
    /** @use SdkModel<AssociationsV4SimplePublicUpsertObjectShape> */
    use SdkModel;

    /**
     * The unique ID of the object.
     */
    #[Api]
    public string $id;

    /**
     * Whether the object is archived.
     */
    #[Api]
    public bool $archived;

    /**
     * The timestamp when the object was created, in ISO 8601 format.
     */
    #[Api]
    public \DateTimeInterface $createdAt;

    /**
     * Whether the property is new.
     */
    #[Api]
    public bool $new;

    /**
     * Key value pairs representing the properties of the object.
     *
     * @var array<string, string> $properties
     */
    #[Api(map: 'string')]
    public array $properties;

    /**
     * The timestamp when the object was last updated, in ISO 8601 format.
     */
    #[Api]
    public \DateTimeInterface $updatedAt;

    /**
     * The timestamp when the object was archived, in ISO 8601 format.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $archivedAt;

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
     * `new AssociationsV4SimplePublicUpsertObject()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociationsV4SimplePublicUpsertObject::with(
     *   id: ...,
     *   archived: ...,
     *   createdAt: ...,
     *   new: ...,
     *   properties: ...,
     *   updatedAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssociationsV4SimplePublicUpsertObject)
     *   ->withID(...)
     *   ->withArchived(...)
     *   ->withCreatedAt(...)
     *   ->withNew(...)
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
     * @param array<string, list<ValueWithTimestamp>> $propertiesWithHistory
     */
    public static function with(
        string $id,
        bool $archived,
        \DateTimeInterface $createdAt,
        bool $new,
        array $properties,
        \DateTimeInterface $updatedAt,
        ?\DateTimeInterface $archivedAt = null,
        ?string $objectWriteTraceID = null,
        ?array $propertiesWithHistory = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->archived = $archived;
        $obj->createdAt = $createdAt;
        $obj->new = $new;
        $obj->properties = $properties;
        $obj->updatedAt = $updatedAt;

        null !== $archivedAt && $obj->archivedAt = $archivedAt;
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
     * Whether the object is archived.
     */
    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

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
     * Whether the property is new.
     */
    public function withNew(bool $new): self
    {
        $obj = clone $this;
        $obj->new = $new;

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
     * The timestamp when the object was archived, in ISO 8601 format.
     */
    public function withArchivedAt(\DateTimeInterface $archivedAt): self
    {
        $obj = clone $this;
        $obj->archivedAt = $archivedAt;

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
