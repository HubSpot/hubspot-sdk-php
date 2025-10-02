<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Properties;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\CRMProperty;

/**
 * @phpstan-type crm_properties_created_response_property = array{
 *   createdResourceID: string, entity: CRMProperty, location?: string
 * }
 */
final class CRMPropertiesCreatedResponseProperty implements BaseModel
{
    /** @use SdkModel<crm_properties_created_response_property> */
    use SdkModel;

    #[Api('createdResourceId')]
    public string $createdResourceID;

    #[Api]
    public CRMProperty $entity;

    #[Api(optional: true)]
    public ?string $location;

    /**
     * `new CRMPropertiesCreatedResponseProperty()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CRMPropertiesCreatedResponseProperty::with(createdResourceID: ..., entity: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CRMPropertiesCreatedResponseProperty)
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
        CRMProperty $entity,
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

    public function withEntity(CRMProperty $entity): self
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
