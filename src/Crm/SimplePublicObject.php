<?php

declare(strict_types=1);

namespace HubspotSDK\Crm;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\ListOf;
use HubspotSDK\Core\Conversion\MapOf;

/**
 * A simple public object.
 *
 * @phpstan-type SimplePublicObjectShape = array{
 *   id: string,
 *   archived: bool,
 *   createdAt: \DateTimeInterface,
 *   properties: array<string,string|null>,
 *   updatedAt: \DateTimeInterface,
 *   archivedAt?: \DateTimeInterface|null,
 *   objectWriteTraceId?: string|null,
 *   propertiesWithHistory?: array<string,list<ValueWithTimestamp>>|null,
 *   url?: string|null,
 * }
 */
final class SimplePublicObject implements BaseModel
{
    /** @use SdkModel<SimplePublicObjectShape> */
    use SdkModel;

    /**
     * The unique ID of the object.
     */
    #[Required]
    public string $id;

    /**
     * Whether the object is archived.
     */
    #[Required]
    public bool $archived;

    /**
     * The timestamp when the object was created, in ISO 8601 format.
     */
    #[Required]
    public \DateTimeInterface $createdAt;

    /**
     * Key-value pairs representing the properties of the object.
     *
     * @var array<string,string|null> $properties
     */
    #[Required(type: new MapOf('string', nullable: true))]
    public array $properties;

    /**
     * The timestamp when the object was last updated, in ISO 8601 format.
     */
    #[Required]
    public \DateTimeInterface $updatedAt;

    /**
     * The timestamp when the object was archived, in ISO 8601 format.
     */
    #[Optional]
    public ?\DateTimeInterface $archivedAt;

    /**
     * A unique identifier for tracing the creation request.
     */
    #[Optional]
    public ?string $objectWriteTraceId;

    /**
     * Key-value pairs representing the properties of the object along with their history.
     *
     * @var array<string,list<ValueWithTimestamp>>|null $propertiesWithHistory
     */
    #[Optional(map: new ListOf(ValueWithTimestamp::class))]
    public ?array $propertiesWithHistory;

    #[Optional]
    public ?string $url;

    /**
     * `new SimplePublicObject()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SimplePublicObject::with(
     *   id: ..., archived: ..., createdAt: ..., properties: ..., updatedAt: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SimplePublicObject)
     *   ->withID(...)
     *   ->withArchived(...)
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
     * @param array<string,list<ValueWithTimestamp|array{
     *   sourceType: string,
     *   timestamp: \DateTimeInterface,
     *   value: string,
     *   sourceId?: string|null,
     *   sourceLabel?: string|null,
     *   updatedByUserId?: int|null,
     * }>> $propertiesWithHistory
     */
    public static function with(
        string $id,
        bool $archived,
        \DateTimeInterface $createdAt,
        array $properties,
        \DateTimeInterface $updatedAt,
        ?\DateTimeInterface $archivedAt = null,
        ?string $objectWriteTraceId = null,
        ?array $propertiesWithHistory = null,
        ?string $url = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['archived'] = $archived;
        $obj['createdAt'] = $createdAt;
        $obj['properties'] = $properties;
        $obj['updatedAt'] = $updatedAt;

        null !== $archivedAt && $obj['archivedAt'] = $archivedAt;
        null !== $objectWriteTraceId && $obj['objectWriteTraceId'] = $objectWriteTraceId;
        null !== $propertiesWithHistory && $obj['propertiesWithHistory'] = $propertiesWithHistory;
        null !== $url && $obj['url'] = $url;

        return $obj;
    }

    /**
     * The unique ID of the object.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Whether the object is archived.
     */
    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj['archived'] = $archived;

        return $obj;
    }

    /**
     * The timestamp when the object was created, in ISO 8601 format.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

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
        $obj['properties'] = $properties;

        return $obj;
    }

    /**
     * The timestamp when the object was last updated, in ISO 8601 format.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * The timestamp when the object was archived, in ISO 8601 format.
     */
    public function withArchivedAt(\DateTimeInterface $archivedAt): self
    {
        $obj = clone $this;
        $obj['archivedAt'] = $archivedAt;

        return $obj;
    }

    /**
     * A unique identifier for tracing the creation request.
     */
    public function withObjectWriteTraceID(string $objectWriteTraceID): self
    {
        $obj = clone $this;
        $obj['objectWriteTraceId'] = $objectWriteTraceID;

        return $obj;
    }

    /**
     * Key-value pairs representing the properties of the object along with their history.
     *
     * @param array<string,list<ValueWithTimestamp|array{
     *   sourceType: string,
     *   timestamp: \DateTimeInterface,
     *   value: string,
     *   sourceId?: string|null,
     *   sourceLabel?: string|null,
     *   updatedByUserId?: int|null,
     * }>> $propertiesWithHistory
     */
    public function withPropertiesWithHistory(
        array $propertiesWithHistory
    ): self {
        $obj = clone $this;
        $obj['propertiesWithHistory'] = $propertiesWithHistory;

        return $obj;
    }

    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj['url'] = $url;

        return $obj;
    }
}
