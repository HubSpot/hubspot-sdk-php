<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\MarketingEvents\ListAssociations;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Associates a list with a marketing event by external account id, external event id, and ILS list id.
 *
 * @see HubSpotSDK\Services\Marketing\MarketingEvents\ListAssociationsService::associateByExternalAccount()
 *
 * @phpstan-type ListAssociationAssociateByExternalAccountParamsShape = array{
 *   externalAccountID: string, externalEventID: string
 * }
 */
final class ListAssociationAssociateByExternalAccountParams implements BaseModel
{
    /** @use SdkModel<ListAssociationAssociateByExternalAccountParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $externalAccountID;

    #[Required]
    public string $externalEventID;

    /**
     * `new ListAssociationAssociateByExternalAccountParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ListAssociationAssociateByExternalAccountParams::with(
     *   externalAccountID: ..., externalEventID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ListAssociationAssociateByExternalAccountParams)
     *   ->withExternalAccountID(...)
     *   ->withExternalEventID(...)
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
        string $externalAccountID,
        string $externalEventID
    ): self {
        $self = new self;

        $self['externalAccountID'] = $externalAccountID;
        $self['externalEventID'] = $externalEventID;

        return $self;
    }

    public function withExternalAccountID(string $externalAccountID): self
    {
        $self = clone $this;
        $self['externalAccountID'] = $externalAccountID;

        return $self;
    }

    public function withExternalEventID(string $externalEventID): self
    {
        $self = clone $this;
        $self['externalEventID'] = $externalEventID;

        return $self;
    }
}
