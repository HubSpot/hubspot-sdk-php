<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\ListOf;
use HubspotSDK\Core\Conversion\MapOf;

/**
 * A simple public object.
 *
 * @phpstan-import-type ValueWithTimestampShape from \HubspotSDK\Crm\Objects\ValueWithTimestamp
 *
 * @phpstan-type SimplePublicObjectShape = array{
 *   id: string,
 *   archived: bool,
 *   createdAt: \DateTimeInterface,
 *   properties: array<string,string|null>,
 *   updatedAt: \DateTimeInterface,
 *   archivedAt?: \DateTimeInterface|null,
 *   objectWriteTraceID?: string|null,
 *   propertiesWithHistory?: array<string,list<ValueWithTimestamp|ValueWithTimestampShape>>|null,
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
     * An identifier used for tracing the write request for the object.
     */
    #[Optional('objectWriteTraceId')]
    public ?string $objectWriteTraceID;

    /**
     * Key-value pairs representing the properties of the object along with their history.
     *
     * @var array<string,list<ValueWithTimestamp>>|null $propertiesWithHistory
     */
    #[Optional(map: new ListOf(ValueWithTimestamp::class))]
    public ?array $propertiesWithHistory;

    /**
     * The URL associated with the object.
     */
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
     * @param array<string,list<ValueWithTimestamp|ValueWithTimestampShape>>|null $propertiesWithHistory
     */
    public static function with(
        string $id,
        bool $archived,
        \DateTimeInterface $createdAt,
        array $properties,
        \DateTimeInterface $updatedAt,
        ?\DateTimeInterface $archivedAt = null,
        ?string $objectWriteTraceID = null,
        ?array $propertiesWithHistory = null,
        ?string $url = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['archived'] = $archived;
        $self['createdAt'] = $createdAt;
        $self['properties'] = $properties;
        $self['updatedAt'] = $updatedAt;

        null !== $archivedAt && $self['archivedAt'] = $archivedAt;
        null !== $objectWriteTraceID && $self['objectWriteTraceID'] = $objectWriteTraceID;
        null !== $propertiesWithHistory && $self['propertiesWithHistory'] = $propertiesWithHistory;
        null !== $url && $self['url'] = $url;

        return $self;
    }

    /**
     * The unique ID of the object.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Whether the object is archived.
     */
    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }

    /**
     * The timestamp when the object was created, in ISO 8601 format.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Key-value pairs representing the properties of the object.
     *
     * @param array<string,string|null> $properties
     */
    public function withProperties(array $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }

    /**
     * The timestamp when the object was last updated, in ISO 8601 format.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * The timestamp when the object was archived, in ISO 8601 format.
     */
    public function withArchivedAt(\DateTimeInterface $archivedAt): self
    {
        $self = clone $this;
        $self['archivedAt'] = $archivedAt;

        return $self;
    }

    /**
     * An identifier used for tracing the write request for the object.
     */
    public function withObjectWriteTraceID(string $objectWriteTraceID): self
    {
        $self = clone $this;
        $self['objectWriteTraceID'] = $objectWriteTraceID;

        return $self;
    }

    /**
     * Key-value pairs representing the properties of the object along with their history.
     *
     * @param array<string,list<ValueWithTimestamp|ValueWithTimestampShape>> $propertiesWithHistory
     */
    public function withPropertiesWithHistory(
        array $propertiesWithHistory
    ): self {
        $self = clone $this;
        $self['propertiesWithHistory'] = $propertiesWithHistory;

        return $self;
    }

    /**
     * The URL associated with the object.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
