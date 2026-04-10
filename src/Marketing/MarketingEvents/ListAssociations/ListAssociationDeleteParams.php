<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\MarketingEvents\ListAssociations;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Disassociates a list from a marketing event by marketing event id and ILS list id.
 *
 * @see HubSpotSDK\Services\Marketing\MarketingEvents\ListAssociationsService::delete()
 *
 * @phpstan-type ListAssociationDeleteParamsShape = array{marketingEventID: string}
 */
final class ListAssociationDeleteParams implements BaseModel
{
    /** @use SdkModel<ListAssociationDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $marketingEventID;

    /**
     * `new ListAssociationDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ListAssociationDeleteParams::with(marketingEventID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ListAssociationDeleteParams)->withMarketingEventID(...)
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
        $self = new self;

        $self['marketingEventID'] = $marketingEventID;

        return $self;
    }

    public function withMarketingEventID(string $marketingEventID): self
    {
        $self = clone $this;
        $self['marketingEventID'] = $marketingEventID;

        return $self;
    }
}
