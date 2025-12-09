<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events\Associations;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Disassociates a list from a marketing event by marketing event id and ILS list id.
 *
 * @see HubspotSDK\Services\Marketing\Events\AssociationsService::delete()
 *
 * @phpstan-type AssociationDeleteParamsShape = array{marketingEventID: string}
 */
final class AssociationDeleteParams implements BaseModel
{
    /** @use SdkModel<AssociationDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $marketingEventID;

    /**
     * `new AssociationDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociationDeleteParams::with(marketingEventID: ...)
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
