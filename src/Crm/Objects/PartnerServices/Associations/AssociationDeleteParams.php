<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\PartnerServices\Associations;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Remove an association between two partner services.
 *
 * @see HubspotSDK\Crm\Objects\PartnerServices\Associations->delete
 *
 * @phpstan-type AssociationDeleteParamsShape = array{
 *   partnerServiceID: string, toObjectType: string, toObjectID: string
 * }
 */
final class AssociationDeleteParams implements BaseModel
{
    /** @use SdkModel<AssociationDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $partnerServiceID;

    #[Api]
    public string $toObjectType;

    #[Api]
    public string $toObjectID;

    /**
     * `new AssociationDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociationDeleteParams::with(
     *   partnerServiceID: ..., toObjectType: ..., toObjectID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssociationDeleteParams)
     *   ->withPartnerServiceID(...)
     *   ->withToObjectType(...)
     *   ->withToObjectID(...)
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
        string $partnerServiceID,
        string $toObjectType,
        string $toObjectID
    ): self {
        $obj = new self;

        $obj->partnerServiceID = $partnerServiceID;
        $obj->toObjectType = $toObjectType;
        $obj->toObjectID = $toObjectID;

        return $obj;
    }

    public function withPartnerServiceID(string $partnerServiceID): self
    {
        $obj = clone $this;
        $obj->partnerServiceID = $partnerServiceID;

        return $obj;
    }

    public function withToObjectType(string $toObjectType): self
    {
        $obj = clone $this;
        $obj->toObjectType = $toObjectType;

        return $obj;
    }

    public function withToObjectID(string $toObjectID): self
    {
        $obj = clone $this;
        $obj->toObjectID = $toObjectID;

        return $obj;
    }
}
