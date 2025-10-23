<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\MarketingEvents;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Returns the details of a Marketing Event with the specified externalAccountId, externalEventId, if it exists.
 *
 * Only Marketing Events created by the same app making the request can be retrieved.
 *
 * @see HubspotSDK\Marketing\MarketingEvents->getByExternalEventID
 *
 * @phpstan-type marketing_event_get_by_external_event_id_params = array{
 *   externalAccountID: string
 * }
 */
final class MarketingEventGetByExternalEventIDParams implements BaseModel
{
    /** @use SdkModel<marketing_event_get_by_external_event_id_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The accountId that is associated with this marketing event in the external event application.
     */
    #[Api]
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
        $obj = new self;

        $obj->externalAccountID = $externalAccountID;

        return $obj;
    }

    /**
     * The accountId that is associated with this marketing event in the external event application.
     */
    public function withExternalAccountID(string $externalAccountID): self
    {
        $obj = clone $this;
        $obj->externalAccountID = $externalAccountID;

        return $obj;
    }
}
