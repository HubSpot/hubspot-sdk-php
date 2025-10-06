<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Properties;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type created_response_property_group = array{
 *   createdResourceID: string, entity: PropertyGroup, location?: string
 * }
 */
final class CreatedResponsePropertyGroup implements BaseModel, ResponseConverter
{
    /** @use SdkModel<created_response_property_group> */
    use SdkModel;

    use SdkResponse;

    #[Api('createdResourceId')]
    public string $createdResourceID;

    #[Api]
    public PropertyGroup $entity;

    #[Api(optional: true)]
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
     */
    public static function with(
        string $createdResourceID,
        PropertyGroup $entity,
        ?string $location = null
    ): self {
        $obj = new self;

        $obj->createdResourceID = $createdResourceID;
        $obj->entity = $entity;

        null !== $location && $obj->location = $location;

        return $obj;
    }

    public function withCreatedResourceID(string $createdResourceID): self
    {
        $obj = clone $this;
        $obj->createdResourceID = $createdResourceID;

        return $obj;
    }

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
