<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Deletes the existing Marketing Event with the specified externalAccountId, externalEventId, if it exists.
 *
 * Only Marketing Events created by the same app can be deleted.
 *
 * @see HubspotSDK\Services\Marketing\EventsService::deleteByExternalEventID()
 *
 * @phpstan-type EventDeleteByExternalEventIDParamsShape = array{
 *   externalAccountId: string
 * }
 */
final class EventDeleteByExternalEventIDParams implements BaseModel
{
    /** @use SdkModel<EventDeleteByExternalEventIDParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The accountId that is associated with this marketing event in the external event application.
     */
    #[Api]
    public string $externalAccountId;

    /**
     * `new EventDeleteByExternalEventIDParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EventDeleteByExternalEventIDParams::with(externalAccountId: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EventDeleteByExternalEventIDParams)->withExternalAccountID(...)
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
    public static function with(string $externalAccountId): self
    {
        $obj = new self;

        $obj['externalAccountId'] = $externalAccountId;

        return $obj;
    }

    /**
     * The accountId that is associated with this marketing event in the external event application.
     */
    public function withExternalAccountID(string $externalAccountID): self
    {
        $obj = clone $this;
        $obj['externalAccountId'] = $externalAccountID;

        return $obj;
    }
}
