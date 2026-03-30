<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events\ListAssociations;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Disassociates a list from a marketing event by external account id, external event id, and ILS list id.
 *
 * @see HubspotSDK\Services\Marketing\Events\ListAssociationsService::deleteByExternalAccount()
 *
 * @phpstan-type ListAssociationDeleteByExternalAccountParamsShape = array{
 *   externalAccountID: string, externalEventID: string
 * }
 */
final class ListAssociationDeleteByExternalAccountParams implements BaseModel
{
    /** @use SdkModel<ListAssociationDeleteByExternalAccountParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $externalAccountID;

    #[Required]
    public string $externalEventID;

    /**
     * `new ListAssociationDeleteByExternalAccountParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ListAssociationDeleteByExternalAccountParams::with(
     *   externalAccountID: ..., externalEventID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ListAssociationDeleteByExternalAccountParams)
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
