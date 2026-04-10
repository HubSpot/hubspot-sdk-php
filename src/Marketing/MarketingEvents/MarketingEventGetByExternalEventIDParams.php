<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\MarketingEvents;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Returns the details of a Marketing Event with the specified externalAccountId, externalEventId, if it exists.
 *
 * Only Marketing Events created by the same app making the request can be retrieved.
 *
 * @see HubSpotSDK\Services\Marketing\MarketingEventsService::getByExternalEventID()
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
