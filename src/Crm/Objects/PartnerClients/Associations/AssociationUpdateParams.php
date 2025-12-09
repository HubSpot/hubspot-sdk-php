<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\PartnerClients\Associations;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Associate a partner client with another object.
 *
 * @see HubspotSDK\Services\Crm\Objects\PartnerClients\AssociationsService::update()
 *
 * @phpstan-type AssociationUpdateParamsShape = array{
 *   partnerClientID: string, toObjectType: string, toObjectID: string
 * }
 */
final class AssociationUpdateParams implements BaseModel
{
    /** @use SdkModel<AssociationUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $partnerClientID;

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
     *   partnerClientID: ..., toObjectType: ..., toObjectID: ...
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
        string $partnerClientID,
        string $toObjectType,
        string $toObjectID
    ): self {
        $self = new self;

        $self['partnerClientID'] = $partnerClientID;
        $self['toObjectType'] = $toObjectType;
        $self['toObjectID'] = $toObjectID;

        return $self;
    }

    public function withPartnerClientID(string $partnerClientID): self
    {
        $self = clone $this;
        $self['partnerClientID'] = $partnerClientID;

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
