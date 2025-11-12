<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events\Associations;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Disassociates a list from a marketing event by marketing event id and ILS list id.
 *
 * @see HubspotSDK\Marketing\Events\Associations->delete
 *
 * @phpstan-type AssociationDeleteParamsShape = array{marketingEventId: string}
 */
final class AssociationDeleteParams implements BaseModel
{
    /** @use SdkModel<AssociationDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $marketingEventId;

    /**
     * `new AssociationDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociationDeleteParams::with(marketingEventId: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssociationDeleteParams)->withMarketingEventID(...)
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
    public static function with(string $marketingEventId): self
    {
        $obj = new self;

        $obj->marketingEventId = $marketingEventId;

        return $obj;
    }

    public function withMarketingEventID(string $marketingEventID): self
    {
        $obj = clone $this;
        $obj->marketingEventId = $marketingEventID;

        return $obj;
    }
}
