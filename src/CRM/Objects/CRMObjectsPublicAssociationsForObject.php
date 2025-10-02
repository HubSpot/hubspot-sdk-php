<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\CRMAssociationSpec;
use HubspotSDK\CRM\CRMPublicObjectID;

/**
 * @phpstan-type crm_objects_public_associations_for_object = array{
 *   to: CRMPublicObjectID, types: list<CRMAssociationSpec>
 * }
 */
final class CRMObjectsPublicAssociationsForObject implements BaseModel
{
    /** @use SdkModel<crm_objects_public_associations_for_object> */
    use SdkModel;

    #[Api]
    public CRMPublicObjectID $to;

    /** @var list<CRMAssociationSpec> $types */
    #[Api(list: CRMAssociationSpec::class)]
    public array $types;

    /**
     * `new CRMObjectsPublicAssociationsForObject()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CRMObjectsPublicAssociationsForObject::with(to: ..., types: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CRMObjectsPublicAssociationsForObject)->withTo(...)->withTypes(...)
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
     *
     * @param list<CRMAssociationSpec> $types
     */
    public static function with(CRMPublicObjectID $to, array $types): self
    {
        $obj = new self;

        $obj->to = $to;
        $obj->types = $types;

        return $obj;
    }

    public function withTo(CRMPublicObjectID $to): self
    {
        $obj = clone $this;
        $obj->to = $to;

        return $obj;
    }

    /**
     * @param list<CRMAssociationSpec> $types
     */
    public function withTypes(array $types): self
    {
        $obj = clone $this;
        $obj->types = $types;

        return $obj;
    }
}
