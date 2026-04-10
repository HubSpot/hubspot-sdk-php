<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\MarketingEvents\ListAssociations;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Gets lists associated with a marketing event by external account id and external event id.
 *
 * @see HubSpotSDK\Services\Marketing\MarketingEvents\ListAssociationsService::listByExternalAccount()
 *
 * @phpstan-type ListAssociationListByExternalAccountParamsShape = array{
 *   externalAccountID: string
 * }
 */
final class ListAssociationListByExternalAccountParams implements BaseModel
{
    /** @use SdkModel<ListAssociationListByExternalAccountParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $externalAccountID;

    /**
     * `new ListAssociationListByExternalAccountParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ListAssociationListByExternalAccountParams::with(externalAccountID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ListAssociationListByExternalAccountParams)->withExternalAccountID(...)
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
    public static function with(string $externalAccountID): self
    {
        $self = new self;

        $self['externalAccountID'] = $externalAccountID;

        return $self;
    }

    public function withExternalAccountID(string $externalAccountID): self
    {
        $self = clone $this;
        $self['externalAccountID'] = $externalAccountID;

        return $self;
    }
}
