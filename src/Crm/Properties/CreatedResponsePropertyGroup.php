<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Properties;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type CreatedResponsePropertyGroupShape = array{
 *   createdResourceId: string, entity: PropertyGroup, location?: string|null
 * }
 */
final class CreatedResponsePropertyGroup implements BaseModel
{
    /** @use SdkModel<CreatedResponsePropertyGroupShape> */
    use SdkModel;

    #[Required]
    public string $createdResourceId;

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
     * CreatedResponsePropertyGroup::with(createdResourceId: ..., entity: ...)
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
        string $createdResourceId,
        PropertyGroup|array $entity,
        ?string $location = null,
    ): self {
        $obj = new self;

        $obj['createdResourceId'] = $createdResourceId;
        $obj['entity'] = $entity;

        null !== $location && $obj['location'] = $location;

        return $obj;
    }

    public function withCreatedResourceID(string $createdResourceID): self
    {
        $obj = clone $this;
        $obj['createdResourceId'] = $createdResourceID;

        return $obj;
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
        $obj = clone $this;
        $obj['entity'] = $entity;

        return $obj;
    }

    public function withLocation(string $location): self
    {
        $obj = clone $this;
        $obj['location'] = $location;

        return $obj;
    }
}
