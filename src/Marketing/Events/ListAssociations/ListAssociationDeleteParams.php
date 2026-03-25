<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events\ListAssociations;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Marketing\Events\ListAssociationsService::delete()
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
