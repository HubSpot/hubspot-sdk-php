<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\DealSplits;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\ListOf;
use HubspotSDK\Core\Conversion\MapOf;
use HubspotSDK\Crm\ValueWithTimestamp;

/**
 * A simple public object.
 *
 * @phpstan-type ObjectsDealSplitsSimplePublicObjectShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   properties: array<string,string|null>,
 *   updatedAt: \DateTimeInterface,
 *   archived?: bool|null,
 *   archivedAt?: \DateTimeInterface|null,
 *   propertiesWithHistory?: array<string,list<ValueWithTimestamp>>|null,
 * }
 */
final class ObjectsDealSplitsSimplePublicObject implements BaseModel
{
    /** @use SdkModel<ObjectsDealSplitsSimplePublicObjectShape> */
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
     * Key-value pairs representing the properties of the object.
     *
     * @var array<string,string|null> $properties
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
     * Key-value pairs representing the properties of the object along with their history.
     *
     * @var array<string,list<ValueWithTimestamp>>|null $propertiesWithHistory
     */
    #[Api(map: new ListOf(ValueWithTimestamp::class), optional: true)]
    public ?array $propertiesWithHistory;

    /**
     * `new ObjectsDealSplitsSimplePublicObject()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ObjectsDealSplitsSimplePublicObject::with(
     *   id: ..., createdAt: ..., properties: ..., updatedAt: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ObjectsDealSplitsSimplePublicObject)
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
     * @param array<string,string|null> $properties
     * @param array<string,list<ValueWithTimestamp>> $propertiesWithHistory
     */
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        array $properties,
        \DateTimeInterface $updatedAt,
        ?bool $archived = null,
        ?\DateTimeInterface $archivedAt = null,
        ?array $propertiesWithHistory = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->createdAt = $createdAt;
        $obj->properties = $properties;
        $obj->updatedAt = $updatedAt;

        null !== $archived && $obj->archived = $archived;
        null !== $archivedAt && $obj->archivedAt = $archivedAt;
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
     * Key-value pairs representing the properties of the object.
     *
     * @param array<string,string|null> $properties
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
     * Key-value pairs representing the properties of the object along with their history.
     *
     * @param array<string,list<ValueWithTimestamp>> $propertiesWithHistory
     */
    public function withPropertiesWithHistory(
        array $propertiesWithHistory
    ): self {
        $obj = clone $this;
        $obj->propertiesWithHistory = $propertiesWithHistory;

        return $obj;
    }
}
