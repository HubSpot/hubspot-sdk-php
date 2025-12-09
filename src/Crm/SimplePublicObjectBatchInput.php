<?php

declare(strict_types=1);

namespace HubspotSDK\Crm;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Contains an array of CRM object records to be processed in a batch operation, each defined by their ID and properties.
 *
 * @phpstan-type SimplePublicObjectBatchInputShape = array{
 *   id: string,
 *   properties: array<string,string>,
 *   idProperty?: string|null,
 *   objectWriteTraceId?: string|null,
 * }
 */
final class SimplePublicObjectBatchInput implements BaseModel
{
    /** @use SdkModel<SimplePublicObjectBatchInputShape> */
    use SdkModel;

    /**
     * The unique ID of the object.
     */
    #[Required]
    public string $id;

    /**
     * Key-value pairs representing the properties of the object.
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
     * A unique identifier for tracing the request.
     */
    #[Optional]
    public ?string $objectWriteTraceId;

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
     * @param array<string,string> $properties
     */
    public static function with(
        string $id,
        array $properties,
        ?string $idProperty = null,
        ?string $objectWriteTraceId = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['properties'] = $properties;

        null !== $idProperty && $obj['idProperty'] = $idProperty;
        null !== $objectWriteTraceId && $obj['objectWriteTraceId'] = $objectWriteTraceId;

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
     * Key-value pairs representing the properties of the object.
     *
     * @param array<string,string> $properties
     */
    public function withProperties(array $properties): self
    {
        $obj = clone $this;
        $obj['properties'] = $properties;

        return $obj;
    }

    /**
     * The name of a unique identifier property, which can be used for identifying objects instead of the object ID.
     */
    public function withIDProperty(string $idProperty): self
    {
        $obj = clone $this;
        $obj['idProperty'] = $idProperty;

        return $obj;
    }

    /**
     * A unique identifier for tracing the request.
     */
    public function withObjectWriteTraceID(string $objectWriteTraceID): self
    {
        $obj = clone $this;
        $obj['objectWriteTraceId'] = $objectWriteTraceID;

        return $obj;
    }
}
