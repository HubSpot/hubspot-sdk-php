<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects;

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
 *   objectWriteTraceID?: string|null,
 * }
 */
final class SimplePublicObjectBatchInput implements BaseModel
{
    /** @use SdkModel<SimplePublicObjectBatchInputShape> */
    use SdkModel;

    /**
     * The ID of the contact to update. This can be the object ID, or the unique property value of the `idProperty` property.
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
     * The name of a unique property, when identifying records by property.
     */
    #[Optional]
    public ?string $idProperty;

    /**
     * A unique identifier for tracing the request.
     */
    #[Optional('objectWriteTraceId')]
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
     * The ID of the contact to update. This can be the object ID, or the unique property value of the `idProperty` property.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Key-value pairs representing the properties of the object.
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
     * The name of a unique property, when identifying records by property.
     */
    public function withIDProperty(string $idProperty): self
    {
        $self = clone $this;
        $self['idProperty'] = $idProperty;

        return $self;
    }

    /**
     * A unique identifier for tracing the request.
     */
    public function withObjectWriteTraceID(string $objectWriteTraceID): self
    {
        $self = clone $this;
        $self['objectWriteTraceID'] = $objectWriteTraceID;

        return $self;
    }
}
