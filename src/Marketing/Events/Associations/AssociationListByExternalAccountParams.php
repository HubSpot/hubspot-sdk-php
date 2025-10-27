<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events\Associations;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Gets lists associated with a marketing event by external account id and external event id.
 *
 * @see HubspotSDK\Marketing\Events\Associations->listByExternalAccount
 *
 * @phpstan-type association_list_by_external_account_params = array{
 *   externalAccountID: string
 * }
 */
final class AssociationListByExternalAccountParams implements BaseModel
{
    /** @use SdkModel<association_list_by_external_account_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $externalAccountID;

    /**
     * `new AssociationListByExternalAccountParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociationListByExternalAccountParams::with(externalAccountID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssociationListByExternalAccountParams)->withExternalAccountID(...)
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
        $obj = new self;

        $obj->externalAccountID = $externalAccountID;

        return $obj;
    }

    public function withExternalAccountID(string $externalAccountID): self
    {
        $obj = clone $this;
        $obj->externalAccountID = $externalAccountID;

        return $obj;
    }
}
