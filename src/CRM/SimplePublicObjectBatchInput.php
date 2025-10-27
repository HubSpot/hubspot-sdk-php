<?php

declare(strict_types=1);

namespace HubspotSDK\CRM;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Contains an array of CRM object records to be processed in a batch operation, each defined by their ID and properties.
 *
 * @phpstan-type simple_public_object_batch_input = array{
 *   id: string,
 *   properties: array<string, string>,
 *   idProperty?: string,
 *   objectWriteTraceID?: string,
 * }
 */
final class SimplePublicObjectBatchInput implements BaseModel
{
    /** @use SdkModel<simple_public_object_batch_input> */
    use SdkModel;

    /**
     * The id to be updated. This can be the object id, or the unique property value of the idProperty property.
     */
    #[Api]
    public string $id;

    /**
     * Key-value pairs representing the properties of the object.
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
     * A unique identifier for tracing the request.
     */
    #[Api('objectWriteTraceId', optional: true)]
    public ?string $objectWriteTraceID;

    /**
     * `new SimplePublicObjectBatchInput()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SimplePublicObjectBatchInput::with(id: ..., properties: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SimplePublicObjectBatchInput)->withID(...)->withProperties(...)
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
     * The id to be updated. This can be the object id, or the unique property value of the idProperty property.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Key-value pairs representing the properties of the object.
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
     * A unique identifier for tracing the request.
     */
    public function withObjectWriteTraceID(string $objectWriteTraceID): self
    {
        $obj = clone $this;
        $obj->objectWriteTraceID = $objectWriteTraceID;

        return $obj;
    }
}
