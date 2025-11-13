<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Mark a marketing event as cancelled.
 *
 * @see HubspotSDK\Services\Marketing\EventsService::cancelByExternalEventID()
 *
 * @phpstan-type EventCancelByExternalEventIDParamsShape = array{
 *   externalAccountId: string
 * }
 */
final class EventCancelByExternalEventIDParams implements BaseModel
{
    /** @use SdkModel<EventCancelByExternalEventIDParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The accountId that is associated with this marketing event in the external event application.
     */
    #[Api]
    public string $externalAccountId;

    /**
     * `new EventCancelByExternalEventIDParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EventCancelByExternalEventIDParams::with(externalAccountId: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EventCancelByExternalEventIDParams)->withExternalAccountID(...)
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

        $obj->externalAccountId = $externalAccountId;

        return $obj;
    }

    /**
     * The accountId that is associated with this marketing event in the external event application.
     */
    public function withExternalAccountID(string $externalAccountID): self
    {
        $obj = clone $this;
        $obj->externalAccountId = $externalAccountID;

        return $obj;
    }
}
