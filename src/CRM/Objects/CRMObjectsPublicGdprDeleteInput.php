<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type crm_objects_public_gdpr_delete_input = array{
 *   objectID: string, idProperty?: string
 * }
 */
final class CRMObjectsPublicGdprDeleteInput implements BaseModel
{
    /** @use SdkModel<crm_objects_public_gdpr_delete_input> */
    use SdkModel;

    #[Api('objectId')]
    public string $objectID;

    #[Api(optional: true)]
    public ?string $idProperty;

    /**
     * `new CRMObjectsPublicGdprDeleteInput()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CRMObjectsPublicGdprDeleteInput::with(objectID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CRMObjectsPublicGdprDeleteInput)->withObjectID(...)
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
        string $objectID,
        ?string $idProperty = null
    ): self {
        $obj = new self;

        $obj->objectID = $objectID;

        null !== $idProperty && $obj->idProperty = $idProperty;

        return $obj;
    }

    public function withObjectID(string $objectID): self
    {
        $obj = clone $this;
        $obj->objectID = $objectID;

        return $obj;
    }

    public function withIDProperty(string $idProperty): self
    {
        $obj = clone $this;
        $obj->idProperty = $idProperty;

        return $obj;
    }
}
