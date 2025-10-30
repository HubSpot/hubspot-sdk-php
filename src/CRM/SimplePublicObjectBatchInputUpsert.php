<?php

declare(strict_types=1);

namespace HubspotSDK\CRM;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Represents an object used in batch upsert operations, containing an object’s unique identifier, its properties, and optionally the unique property name and a write trace ID.
 *
 * @phpstan-type SimplePublicObjectBatchInputUpsertShape = array{
 *   id: string,
 *   properties: array<string, string>,
 *   idProperty?: string,
 *   objectWriteTraceID?: string,
 * }
 */
final class SimplePublicObjectBatchInputUpsert implements BaseModel
{
    /** @use SdkModel<SimplePublicObjectBatchInputUpsertShape> */
    use SdkModel;

    /**
     * The unique ID of the object.
     */
    #[Api]
    public string $id;

    /**
     * Key value pairs representing the properties of the object.
     *
     * @var array<string, string> $properties
     */
    #[Api(map: 'string')]
    public array $properties;

    /**
     * The name of a property whose values are unique for this object.
     */
    #[Api(optional: true)]
    public ?string $idProperty;

    /**
     * An identifier for tracing the creation request.
     */
    #[Api('objectWriteTraceId', optional: true)]
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
     * @param array<string, string> $properties
     */
    public static function with(
        string $id,
        array $properties,
        ?string $idProperty = null,
        ?string $objectWriteTraceID = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->properties = $properties;

        null !== $idProperty && $obj->idProperty = $idProperty;
        null !== $objectWriteTraceID && $obj->objectWriteTraceID = $objectWriteTraceID;

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
     * The name of a property whose values are unique for this object.
     */
    public function withIDProperty(string $idProperty): self
    {
        $obj = clone $this;
        $obj->idProperty = $idProperty;

        return $obj;
    }

    /**
     * An identifier for tracing the creation request.
     */
    public function withObjectWriteTraceID(string $objectWriteTraceID): self
    {
        $obj = clone $this;
        $obj->objectWriteTraceID = $objectWriteTraceID;

        return $obj;
    }
}
