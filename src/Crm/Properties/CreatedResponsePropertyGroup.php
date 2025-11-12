<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Properties;

use HubspotSDK\Core\Attributes\Api;
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

    #[Api]
    public string $createdResourceId;

    /**
     * An ID for a group of properties.
     */
    #[Api]
    public PropertyGroup $entity;

    #[Api(optional: true)]
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
     */
    public static function with(
        string $createdResourceId,
        PropertyGroup $entity,
        ?string $location = null
    ): self {
        $obj = new self;

        $obj->createdResourceId = $createdResourceId;
        $obj->entity = $entity;

        null !== $location && $obj->location = $location;

        return $obj;
    }

    public function withCreatedResourceID(string $createdResourceID): self
    {
        $obj = clone $this;
        $obj->createdResourceId = $createdResourceID;

        return $obj;
    }

    /**
     * An ID for a group of properties.
     */
    public function withEntity(PropertyGroup $entity): self
    {
        $obj = clone $this;
        $obj->entity = $entity;

        return $obj;
    }

    public function withLocation(string $location): self
    {
        $obj = clone $this;
        $obj->location = $location;

        return $obj;
    }
}
