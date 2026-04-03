<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\MarketingEvents;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieves Marketing Events where the externalEventId matches the value provided in the request, limited to events created by the app making the request.
 *
 * Marketing Events created by other apps will not be included in the results.
 *
 * @see HubspotSDK\Services\Marketing\MarketingEventsService::searchByExternalEventID()
 *
 * @phpstan-type MarketingEventSearchByExternalEventIDParamsShape = array{
 *   q: string
 * }
 */
final class MarketingEventSearchByExternalEventIDParams implements BaseModel
{
    /** @use SdkModel<MarketingEventSearchByExternalEventIDParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $q;

    /**
     * `new MarketingEventSearchByExternalEventIDParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MarketingEventSearchByExternalEventIDParams::with(q: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MarketingEventSearchByExternalEventIDParams)->withQ(...)
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
    public static function with(string $q): self
    {
        $self = new self;

        $self['q'] = $q;

        return $self;
    }

    public function withQ(string $q): self
    {
        $self = clone $this;
        $self['q'] = $q;

        return $self;
    }
}
