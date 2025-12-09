<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events\Associations;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Associates a list with a marketing event by external account id, external event id, and ILS list id.
 *
 * @see HubspotSDK\Services\Marketing\Events\AssociationsService::associateByExternalAccount()
 *
 * @phpstan-type AssociationAssociateByExternalAccountParamsShape = array{
 *   externalAccountId: string, externalEventId: string
 * }
 */
final class AssociationAssociateByExternalAccountParams implements BaseModel
{
    /** @use SdkModel<AssociationAssociateByExternalAccountParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $externalAccountId;

    #[Required]
    public string $externalEventId;

    /**
     * `new AssociationAssociateByExternalAccountParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociationAssociateByExternalAccountParams::with(
     *   externalAccountId: ..., externalEventId: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssociationAssociateByExternalAccountParams)
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
        string $externalAccountId,
        string $externalEventId
    ): self {
        $obj = new self;

        $obj['externalAccountId'] = $externalAccountId;
        $obj['externalEventId'] = $externalEventId;

        return $obj;
    }

    public function withExternalAccountID(string $externalAccountID): self
    {
        $obj = clone $this;
        $obj['externalAccountId'] = $externalAccountID;

        return $obj;
    }

    public function withExternalEventID(string $externalEventID): self
    {
        $obj = clone $this;
        $obj['externalEventId'] = $externalEventID;

        return $obj;
    }
}
