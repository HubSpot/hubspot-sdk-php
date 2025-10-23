<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\MarketingEvents\Associations;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Disassociates a list from a marketing event by external account id, external event id, and ILS list id.
 *
 * @see HubspotSDK\Marketing\MarketingEvents\Associations->deleteByExternalAccount
 *
 * @phpstan-type association_delete_by_external_account_params = array{
 *   externalAccountID: string, externalEventID: string
 * }
 */
final class AssociationDeleteByExternalAccountParams implements BaseModel
{
    /** @use SdkModel<association_delete_by_external_account_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $externalAccountID;

    #[Api]
    public string $externalEventID;

    /**
     * `new AssociationDeleteByExternalAccountParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociationDeleteByExternalAccountParams::with(
     *   externalAccountID: ..., externalEventID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssociationDeleteByExternalAccountParams)
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
        $obj = new self;

        $obj->externalAccountID = $externalAccountID;
        $obj->externalEventID = $externalEventID;

        return $obj;
    }

    public function withExternalAccountID(string $externalAccountID): self
    {
        $obj = clone $this;
        $obj->externalAccountID = $externalAccountID;

        return $obj;
    }

    public function withExternalEventID(string $externalEventID): self
    {
        $obj = clone $this;
        $obj->externalEventID = $externalEventID;

        return $obj;
    }
}
