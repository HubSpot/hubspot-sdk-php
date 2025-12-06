<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\PartnerClients\Associations;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Associate a partner client with another object.
 *
 * @see HubspotSDK\Services\Crm\Objects\PartnerClients\AssociationsService::update()
 *
 * @phpstan-type AssociationUpdateParamsShape = array{
 *   partnerClientId: string, toObjectType: string, toObjectId: string
 * }
 */
final class AssociationUpdateParams implements BaseModel
{
    /** @use SdkModel<AssociationUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $partnerClientId;

    #[Api]
    public string $toObjectType;

    #[Api]
    public string $toObjectId;

    /**
     * `new AssociationUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociationUpdateParams::with(
     *   partnerClientId: ..., toObjectType: ..., toObjectId: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssociationUpdateParams)
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

        $obj['partnerClientId'] = $partnerClientId;
        $obj['toObjectType'] = $toObjectType;
        $obj['toObjectId'] = $toObjectId;

        return $obj;
    }

    public function withPartnerClientID(string $partnerClientID): self
    {
        $obj = clone $this;
        $obj['partnerClientId'] = $partnerClientID;

        return $obj;
    }

    public function withToObjectType(string $toObjectType): self
    {
        $obj = clone $this;
        $obj['toObjectType'] = $toObjectType;

        return $obj;
    }

    public function withToObjectID(string $toObjectID): self
    {
        $obj = clone $this;
        $obj['toObjectId'] = $toObjectID;

        return $obj;
    }
}
