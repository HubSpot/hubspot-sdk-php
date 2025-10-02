<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type crm_objects_simple_public_object_id = array{id: string}
 */
final class CRMObjectsSimplePublicObjectID implements BaseModel
{
    /** @use SdkModel<crm_objects_simple_public_object_id> */
    use SdkModel;

    #[Api]
    public string $id;

    /**
     * `new CRMObjectsSimplePublicObjectID()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CRMObjectsSimplePublicObjectID::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CRMObjectsSimplePublicObjectID)->withID(...)
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
    public static function with(string $id): self
    {
        $obj = new self;

        $obj->id = $id;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }
}
