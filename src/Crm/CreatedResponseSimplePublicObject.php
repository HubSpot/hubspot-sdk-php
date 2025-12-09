<?php

declare(strict_types=1);

namespace HubspotSDK\Crm;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type CreatedResponseSimplePublicObjectShape = array{
 *   createdResourceID: string, entity: SimplePublicObject, location?: string|null
 * }
 */
final class CreatedResponseSimplePublicObject implements BaseModel
{
    /** @use SdkModel<CreatedResponseSimplePublicObjectShape> */
    use SdkModel;

    /**
     * The unique identifier of the newly created resource.
     */
    #[Required('createdResourceId')]
    public string $createdResourceID;

    /**
     * A simple public object.
     */
    #[Required]
    public SimplePublicObject $entity;

    /**
     * The URL location of the newly created resource.
     */
    #[Optional]
    public ?string $location;

    /**
     * `new CreatedResponseSimplePublicObject()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CreatedResponseSimplePublicObject::with(createdResourceID: ..., entity: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CreatedResponseSimplePublicObject)
     *   ->withCreatedResourceID(...)
     *   ->withEntity(...)
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
     * @param SimplePublicObject|array{
     *   id: string,
     *   archived: bool,
     *   createdAt: \DateTimeInterface,
     *   properties: array<string,string|null>,
     *   updatedAt: \DateTimeInterface,
     *   archivedAt?: \DateTimeInterface|null,
     *   objectWriteTraceID?: string|null,
     *   propertiesWithHistory?: array<string,list<ValueWithTimestamp>>|null,
     *   url?: string|null,
     * } $entity
     */
    public static function with(
        string $createdResourceID,
        SimplePublicObject|array $entity,
        ?string $location = null,
    ): self {
        $self = new self;

        $self['createdResourceID'] = $createdResourceID;
        $self['entity'] = $entity;

        null !== $location && $self['location'] = $location;

        return $self;
    }

    /**
     * The unique identifier of the newly created resource.
     */
    public function withCreatedResourceID(string $createdResourceID): self
    {
        $self = clone $this;
        $self['createdResourceID'] = $createdResourceID;

        return $self;
    }

    /**
     * A simple public object.
     *
     * @param SimplePublicObject|array{
     *   id: string,
     *   archived: bool,
     *   createdAt: \DateTimeInterface,
     *   properties: array<string,string|null>,
     *   updatedAt: \DateTimeInterface,
     *   archivedAt?: \DateTimeInterface|null,
     *   objectWriteTraceID?: string|null,
     *   propertiesWithHistory?: array<string,list<ValueWithTimestamp>>|null,
     *   url?: string|null,
     * } $entity
     */
    public function withEntity(SimplePublicObject|array $entity): self
    {
        $self = clone $this;
        $self['entity'] = $entity;

        return $self;
    }

    /**
     * The URL location of the newly created resource.
     */
    public function withLocation(string $location): self
    {
        $self = clone $this;
        $self['location'] = $location;

        return $self;
    }
}
