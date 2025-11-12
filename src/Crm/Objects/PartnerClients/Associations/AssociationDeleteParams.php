<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\PartnerClients\Associations;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Remove an association between two partner clients.
 *
 * @see HubspotSDK\Crm\Objects\PartnerClients\Associations->delete
 *
 * @phpstan-type AssociationDeleteParamsShape = array{
 *   partnerClientId: string, toObjectType: string, toObjectId: string
 * }
 */
final class AssociationDeleteParams implements BaseModel
{
    /** @use SdkModel<AssociationDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $partnerClientId;

    #[Api]
    public string $toObjectType;

    #[Api]
    public string $toObjectId;

    /**
     * `new AssociationDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociationDeleteParams::with(
     *   partnerClientId: ..., toObjectType: ..., toObjectId: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssociationDeleteParams)
     *   ->withPartnerClientID(...)
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
        string $partnerClientId,
        string $toObjectType,
        string $toObjectId
    ): self {
        $obj = new self;

        $obj->partnerClientId = $partnerClientId;
        $obj->toObjectType = $toObjectType;
        $obj->toObjectId = $toObjectId;

        return $obj;
    }

    public function withPartnerClientID(string $partnerClientID): self
    {
        $obj = clone $this;
        $obj->partnerClientId = $partnerClientID;

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
        $obj->toObjectId = $toObjectID;

        return $obj;
    }
}
