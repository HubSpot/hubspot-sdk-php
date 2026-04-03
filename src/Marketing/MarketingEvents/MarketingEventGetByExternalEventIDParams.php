<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\MarketingEvents;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Returns the details of a Marketing Event with the specified externalAccountId, externalEventId, if it exists.
 *
 * Only Marketing Events created by the same app making the request can be retrieved.
 *
 * @see HubspotSDK\Services\Marketing\MarketingEventsService::getByExternalEventID()
 *
 * @phpstan-type MarketingEventGetByExternalEventIDParamsShape = array{
 *   externalAccountID: string
 * }
 */
final class MarketingEventGetByExternalEventIDParams implements BaseModel
{
    /** @use SdkModel<MarketingEventGetByExternalEventIDParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $externalAccountID;

    /**
     * `new MarketingEventGetByExternalEventIDParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MarketingEventGetByExternalEventIDParams::with(externalAccountID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MarketingEventGetByExternalEventIDParams)->withExternalAccountID(...)
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
        $self = new self;

        $self['externalAccountID'] = $externalAccountID;

        return $self;
    }

    public function withExternalAccountID(string $externalAccountID): self
    {
        $self = clone $this;
        $self['externalAccountID'] = $externalAccountID;

        return $self;
    }
}
