<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Properties;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Property;

/**
 * @phpstan-import-type PropertyShape from \HubspotSDK\Property
 *
 * @phpstan-type CreatedResponsePropertyShape = array{
 *   createdResourceID: string,
 *   entity: Property|PropertyShape,
 *   location?: string|null,
 * }
 */
final class CreatedResponseProperty implements BaseModel
{
    /** @use SdkModel<CreatedResponsePropertyShape> */
    use SdkModel;

    #[Required('createdResourceId')]
    public string $createdResourceID;

    /**
     * Defines a property.
     */
    #[Required]
    public Property $entity;

    #[Optional]
    public ?string $location;

    /**
     * `new CreatedResponseProperty()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CreatedResponseProperty::with(createdResourceID: ..., entity: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CreatedResponseProperty)->withCreatedResourceID(...)->withEntity(...)
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
     * @param Property|PropertyShape $entity
     */
    public static function with(
        string $createdResourceID,
        Property|array $entity,
        ?string $location = null
    ): self {
        $self = new self;

        $self['createdResourceID'] = $createdResourceID;
        $self['entity'] = $entity;

        null !== $location && $self['location'] = $location;

        return $self;
    }

    public function withCreatedResourceID(string $createdResourceID): self
    {
        $self = clone $this;
        $self['createdResourceID'] = $createdResourceID;

        return $self;
    }

    /**
     * Defines a property.
     *
     * @param Property|PropertyShape $entity
     */
    public function withEntity(Property|array $entity): self
    {
        $self = clone $this;
        $self['entity'] = $entity;

        return $self;
    }

    public function withLocation(string $location): self
    {
        $self = clone $this;
        $self['location'] = $location;

        return $self;
    }
}
