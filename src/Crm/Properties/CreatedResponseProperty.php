<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Properties;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;
use HubspotSDK\Property;

/**
 * @phpstan-type CreatedResponsePropertyShape = array{
 *   createdResourceId: string, entity: Property, location?: string|null
 * }
 */
final class CreatedResponseProperty implements BaseModel, ResponseConverter
{
    /** @use SdkModel<CreatedResponsePropertyShape> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public string $createdResourceId;

    /**
     * Defines a property.
     */
    #[Api]
    public Property $entity;

    #[Api(optional: true)]
    public ?string $location;

    /**
     * `new CreatedResponseProperty()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CreatedResponseProperty::with(createdResourceId: ..., entity: ...)
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
     */
    public static function with(
        string $createdResourceId,
        Property $entity,
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
     * Defines a property.
     */
    public function withEntity(Property $entity): self
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
