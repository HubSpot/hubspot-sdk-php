<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events\Associations;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Disassociates a list from a marketing event by external account id, external event id, and ILS list id.
 *
 * @see HubspotSDK\Services\Marketing\Events\AssociationsService::deleteByExternalAccount()
 *
 * @phpstan-type AssociationDeleteByExternalAccountParamsShape = array{
 *   externalAccountId: string, externalEventId: string
 * }
 */
final class AssociationDeleteByExternalAccountParams implements BaseModel
{
    /** @use SdkModel<AssociationDeleteByExternalAccountParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $externalAccountId;

    #[Required]
    public string $externalEventId;

    /**
     * `new AssociationDeleteByExternalAccountParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociationDeleteByExternalAccountParams::with(
     *   externalAccountId: ..., externalEventId: ...
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
