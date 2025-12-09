<?php

declare(strict_types=1);

namespace HubspotSDK\Crm;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Represents an object used in batch upsert operations, containing an object’s unique identifier, its properties, and optionally the unique property name and a write trace ID.
 *
 * @phpstan-type SimplePublicObjectBatchInputUpsertShape = array{
 *   id: string,
 *   properties: array<string,string>,
 *   idProperty?: string|null,
 *   objectWriteTraceID?: string|null,
 * }
 */
final class SimplePublicObjectBatchInputUpsert implements BaseModel
{
    /** @use SdkModel<SimplePublicObjectBatchInputUpsertShape> */
    use SdkModel;

    /**
     * The unique ID of the object.
     */
    #[Required]
    public string $id;

    /**
     * Key value pairs representing the properties of the object.
     *
     * @var array<string,string> $properties
     */
    #[Required(map: 'string')]
    public array $properties;

    /**
     * The name of a unique identifier property, which can be used for identifying objects instead of the object ID.
     */
    #[Optional]
    public ?string $idProperty;

    /**
     * An identifier for tracing the creation request.
     */
    #[Optional('objectWriteTraceId')]
    public ?string $objectWriteTraceID;

    /**
     * `new SimplePublicObjectBatchInputUpsert()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SimplePublicObjectBatchInputUpsert::with(id: ..., properties: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SimplePublicObjectBatchInputUpsert)->withID(...)->withProperties(...)
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
     * @param array<string,string> $properties
     */
    public static function with(
        string $id,
        array $properties,
        ?string $idProperty = null,
        ?string $objectWriteTraceID = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['properties'] = $properties;

        null !== $idProperty && $self['idProperty'] = $idProperty;
        null !== $objectWriteTraceID && $self['objectWriteTraceID'] = $objectWriteTraceID;

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
     * Key value pairs representing the properties of the object.
     *
     * @param array<string,string> $properties
     */
    public function withProperties(array $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }

    /**
     * The name of a unique identifier property, which can be used for identifying objects instead of the object ID.
     */
    public function withIDProperty(string $idProperty): self
    {
        $self = clone $this;
        $self['idProperty'] = $idProperty;

        return $self;
    }

    /**
     * An identifier for tracing the creation request.
     */
    public function withObjectWriteTraceID(string $objectWriteTraceID): self
    {
        $self = clone $this;
        $self['objectWriteTraceID'] = $objectWriteTraceID;

        return $self;
    }
}
