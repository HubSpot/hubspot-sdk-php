<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events\Associations;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Associates a list with a marketing event by marketing event id and ILS list id.
 *
 * @see HubspotSDK\Marketing\Events\Associations->associate
 *
 * @phpstan-type AssociationAssociateParamsShape = array{marketingEventID: string}
 */
final class AssociationAssociateParams implements BaseModel
{
    /** @use SdkModel<AssociationAssociateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $marketingEventID;

    /**
     * `new AssociationAssociateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociationAssociateParams::with(marketingEventID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssociationAssociateParams)->withMarketingEventID(...)
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
    public static function with(string $marketingEventID): self
    {
        $obj = new self;

        $obj->marketingEventID = $marketingEventID;

        return $obj;
    }

    public function withMarketingEventID(string $marketingEventID): self
    {
        $obj = clone $this;
        $obj->marketingEventID = $marketingEventID;

        return $obj;
    }
}
