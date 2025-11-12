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
 * @phpstan-type AssociationListByExternalAccountParamsShape = array{
 *   externalAccountId: string
 * }
 */
final class AssociationListByExternalAccountParams implements BaseModel
{
    /** @use SdkModel<AssociationListByExternalAccountParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $externalAccountId;

    /**
     * `new AssociationListByExternalAccountParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociationListByExternalAccountParams::with(externalAccountId: ...)
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
    public static function with(string $externalAccountId): self
    {
        $obj = new self;

        $obj->externalAccountId = $externalAccountId;

        return $obj;
    }

    public function withExternalAccountID(string $externalAccountID): self
    {
        $obj = clone $this;
        $obj->externalAccountId = $externalAccountID;

        return $obj;
    }
}
