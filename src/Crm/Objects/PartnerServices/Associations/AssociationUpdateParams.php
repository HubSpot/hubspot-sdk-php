<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\PartnerServices\Associations;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Associate a partner service with another object.
 *
 * @see HubspotSDK\Services\Crm\Objects\PartnerServices\AssociationsService::update()
 *
 * @phpstan-type AssociationUpdateParamsShape = array{
 *   partnerServiceId: string, toObjectType: string, toObjectId: string
 * }
 */
final class AssociationUpdateParams implements BaseModel
{
    /** @use SdkModel<AssociationUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $partnerServiceId;

    #[Required]
    public string $toObjectType;

    #[Required]
    public string $toObjectId;

    /**
     * `new AssociationUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociationUpdateParams::with(
     *   partnerServiceId: ..., toObjectType: ..., toObjectId: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssociationUpdateParams)
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
        string $partnerServiceId,
        string $toObjectType,
        string $toObjectId
    ): self {
        $obj = new self;

        $obj['partnerServiceId'] = $partnerServiceId;
        $obj['toObjectType'] = $toObjectType;
        $obj['toObjectId'] = $toObjectId;

        return $obj;
    }

    public function withPartnerServiceID(string $partnerServiceID): self
    {
        $obj = clone $this;
        $obj['partnerServiceId'] = $partnerServiceID;

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
