<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events\Events;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Marketing\Events\EventsService::cancelByExternalEventID()
 *
 * @phpstan-type EventCancelByExternalEventIDParamsShape = array{
 *   externalAccountID: string
 * }
 */
final class EventCancelByExternalEventIDParams implements BaseModel
{
    /** @use SdkModel<EventCancelByExternalEventIDParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $externalAccountID;

    /**
     * `new EventCancelByExternalEventIDParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EventCancelByExternalEventIDParams::with(externalAccountID: ...)
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
