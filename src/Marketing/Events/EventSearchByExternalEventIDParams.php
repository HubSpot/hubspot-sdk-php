<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieves Marketing Events where the externalEventId matches the value provided in the request, limited to events created by the app making the request.
 *
 * Marketing Events created by other apps will not be included in the results.
 *
 * @see HubspotSDK\Marketing\Events->searchByExternalEventID
 *
 * @phpstan-type event_search_by_external_event_id_params = array{q: string}
 */
final class EventSearchByExternalEventIDParams implements BaseModel
{
    /** @use SdkModel<event_search_by_external_event_id_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The id of the marketing event in the external event application (externalEventId).
     */
    #[Api]
    public string $q;

    /**
     * `new EventSearchByExternalEventIDParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EventSearchByExternalEventIDParams::with(q: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EventSearchByExternalEventIDParams)->withQ(...)
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
        $obj = new self;

        $obj->q = $q;

        return $obj;
    }

    /**
     * The id of the marketing event in the external event application (externalEventId).
     */
    public function withQ(string $q): self
    {
        $obj = clone $this;
        $obj->q = $q;

        return $obj;
    }
}
