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
 *   partnerServiceID: string, toObjectType: string, toObjectID: string
 * }
 */
final class AssociationUpdateParams implements BaseModel
{
    /** @use SdkModel<AssociationUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $partnerServiceID;

    #[Required]
    public string $toObjectType;

    #[Required]
    public string $toObjectID;

    /**
     * `new AssociationUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociationUpdateParams::with(
     *   partnerServiceID: ..., toObjectType: ..., toObjectID: ...
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
        string $partnerServiceID,
        string $toObjectType,
        string $toObjectID
    ): self {
        $self = new self;

        $self['partnerServiceID'] = $partnerServiceID;
        $self['toObjectType'] = $toObjectType;
        $self['toObjectID'] = $toObjectID;

        return $self;
    }

    public function withPartnerServiceID(string $partnerServiceID): self
    {
        $self = clone $this;
        $self['partnerServiceID'] = $partnerServiceID;

        return $self;
    }

    public function withToObjectType(string $toObjectType): self
    {
        $self = clone $this;
        $self['toObjectType'] = $toObjectType;

        return $self;
    }

    public function withToObjectID(string $toObjectID): self
    {
        $self = clone $this;
        $self['toObjectID'] = $toObjectID;

        return $self;
    }
}
