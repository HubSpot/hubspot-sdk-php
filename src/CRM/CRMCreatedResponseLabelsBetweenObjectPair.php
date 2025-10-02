<?php

declare(strict_types=1);

namespace HubspotSDK\CRM;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type crm_created_response_labels_between_object_pair = array{
 *   createdResourceID: string,
 *   entity: CRMLabelsBetweenObjectPair,
 *   location?: string,
 * }
 */
final class CRMCreatedResponseLabelsBetweenObjectPair implements BaseModel
{
    /** @use SdkModel<crm_created_response_labels_between_object_pair> */
    use SdkModel;

    #[Api('createdResourceId')]
    public string $createdResourceID;

    #[Api]
    public CRMLabelsBetweenObjectPair $entity;

    #[Api(optional: true)]
    public ?string $location;

    /**
     * `new CRMCreatedResponseLabelsBetweenObjectPair()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CRMCreatedResponseLabelsBetweenObjectPair::with(
     *   createdResourceID: ..., entity: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CRMCreatedResponseLabelsBetweenObjectPair)
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
        CRMLabelsBetweenObjectPair $entity,
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

    public function withEntity(CRMLabelsBetweenObjectPair $entity): self
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
