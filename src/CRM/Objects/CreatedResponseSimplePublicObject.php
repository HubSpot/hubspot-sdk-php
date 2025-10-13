<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type created_response_simple_public_object = array{
 *   createdResourceID: string, entity: SimplePublicObject, location?: string
 * }
 */
final class CreatedResponseSimplePublicObject implements BaseModel
{
    /** @use SdkModel<created_response_simple_public_object> */
    use SdkModel;

    #[Api('createdResourceId')]
    public string $createdResourceID;

    /**
     * A simple public object.
     */
    #[Api]
    public SimplePublicObject $entity;

    #[Api(optional: true)]
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
     */
    public static function with(
        string $createdResourceID,
        SimplePublicObject $entity,
        ?string $location = null,
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

    /**
     * A simple public object.
     */
    public function withEntity(SimplePublicObject $entity): self
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
