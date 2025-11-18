<?php

declare(strict_types=1);

namespace HubspotSDK\Crm;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type CreatedResponseSimplePublicObjectShape = array{
 *   createdResourceId: string, entity: SimplePublicObject, location?: string|null
 * }
 */
final class CreatedResponseSimplePublicObject implements BaseModel
{
    /** @use SdkModel<CreatedResponseSimplePublicObjectShape> */
    use SdkModel;

    /**
     * The unique identifier of the newly created resource.
     */
    #[Api]
    public string $createdResourceId;

    /**
     * A simple public object.
     */
    #[Api]
    public SimplePublicObject $entity;

    /**
     * The URL location of the newly created resource.
     */
    #[Api(optional: true)]
    public ?string $location;

    /**
     * `new CreatedResponseSimplePublicObject()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CreatedResponseSimplePublicObject::with(createdResourceId: ..., entity: ...)
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
        string $createdResourceId,
        SimplePublicObject $entity,
        ?string $location = null,
    ): self {
        $obj = new self;

        $obj->createdResourceId = $createdResourceId;
        $obj->entity = $entity;

        null !== $location && $obj->location = $location;

        return $obj;
    }

    /**
     * The unique identifier of the newly created resource.
     */
    public function withCreatedResourceID(string $createdResourceID): self
    {
        $obj = clone $this;
        $obj->createdResourceId = $createdResourceID;

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

    /**
     * The URL location of the newly created resource.
     */
    public function withLocation(string $location): self
    {
        $obj = clone $this;
        $obj->location = $location;

        return $obj;
    }
}
