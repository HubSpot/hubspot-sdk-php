<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Properties;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type CreatedResponsePropertyGroupShape = array{
 *   createdResourceID: string, entity: PropertyGroup, location?: string|null
 * }
 */
final class CreatedResponsePropertyGroup implements BaseModel
{
    /** @use SdkModel<CreatedResponsePropertyGroupShape> */
    use SdkModel;

    #[Required('createdResourceId')]
    public string $createdResourceID;

    /**
     * An ID for a group of properties.
     */
    #[Required]
    public PropertyGroup $entity;

    #[Optional]
    public ?string $location;

    /**
     * `new CreatedResponsePropertyGroup()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CreatedResponsePropertyGroup::with(createdResourceID: ..., entity: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CreatedResponsePropertyGroup)->withCreatedResourceID(...)->withEntity(...)
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
     * @param PropertyGroup|array{
     *   archived: bool, displayOrder: int, label: string, name: string
     * } $entity
     */
    public static function with(
        string $createdResourceID,
        PropertyGroup|array $entity,
        ?string $location = null,
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
     * An ID for a group of properties.
     *
     * @param PropertyGroup|array{
     *   archived: bool, displayOrder: int, label: string, name: string
     * } $entity
     */
    public function withEntity(PropertyGroup|array $entity): self
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
