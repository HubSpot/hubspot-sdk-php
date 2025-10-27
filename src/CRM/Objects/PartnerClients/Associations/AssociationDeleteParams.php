<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects\PartnerClients\Associations;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Remove an association between two partner clients.
 *
 * @see HubspotSDK\CRM\Objects\PartnerClients\Associations->delete
 *
 * @phpstan-type association_delete_params = array{
 *   partnerClientID: string, toObjectType: string, toObjectID: string
 * }
 */
final class AssociationDeleteParams implements BaseModel
{
    /** @use SdkModel<association_delete_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $partnerClientID;

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
     *   partnerClientID: ..., toObjectType: ..., toObjectID: ...
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
        string $partnerClientID,
        string $toObjectType,
        string $toObjectID
    ): self {
        $obj = new self;

        $obj->partnerClientID = $partnerClientID;
        $obj->toObjectType = $toObjectType;
        $obj->toObjectID = $toObjectID;

        return $obj;
    }

    public function withPartnerClientID(string $partnerClientID): self
    {
        $obj = clone $this;
        $obj->partnerClientID = $partnerClientID;

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
