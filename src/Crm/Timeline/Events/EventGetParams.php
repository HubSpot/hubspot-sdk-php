<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Timeline\Events;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve an event instance, specified by template ID and event ID.
 *
 * @see HubspotSDK\Services\Crm\Timeline\EventsService::get()
 *
 * @phpstan-type EventGetParamsShape = array{eventTemplateID: string}
 */
final class EventGetParams implements BaseModel
{
    /** @use SdkModel<EventGetParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $eventTemplateID;

    /**
     * `new EventGetParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EventGetParams::with(eventTemplateID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EventGetParams)->withEventTemplateID(...)
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
    public static function with(string $eventTemplateID): self
    {
        $self = new self;

        $self['eventTemplateID'] = $eventTemplateID;

        return $self;
    }

    public function withEventTemplateID(string $eventTemplateID): self
    {
        $self = clone $this;
        $self['eventTemplateID'] = $eventTemplateID;

        return $self;
    }
}
