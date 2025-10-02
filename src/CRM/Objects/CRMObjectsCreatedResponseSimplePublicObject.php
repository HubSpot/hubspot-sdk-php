<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type crm_objects_created_response_simple_public_object = array{
 *   createdResourceID: string,
 *   entity: CRMObjectsSimplePublicObject,
 *   location?: string,
 * }
 */
final class CRMObjectsCreatedResponseSimplePublicObject implements BaseModel
{
    /** @use SdkModel<crm_objects_created_response_simple_public_object> */
    use SdkModel;

    #[Api('createdResourceId')]
    public string $createdResourceID;

    #[Api]
    public CRMObjectsSimplePublicObject $entity;

    #[Api(optional: true)]
    public ?string $location;

    /**
     * `new CRMObjectsCreatedResponseSimplePublicObject()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CRMObjectsCreatedResponseSimplePublicObject::with(
     *   createdResourceID: ..., entity: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CRMObjectsCreatedResponseSimplePublicObject)
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
        CRMObjectsSimplePublicObject $entity,
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

    public function withEntity(CRMObjectsSimplePublicObject $entity): self
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
