<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Timeline\Events;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve an event instance, specified by template ID and event ID.
 *
 * @see HubspotSDK\CRM\Timeline\Events->get
 *
 * @phpstan-type EventGetParamsShape = array{eventTemplateID: string}
 */
final class EventGetParams implements BaseModel
{
    /** @use SdkModel<EventGetParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
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
        $obj = new self;

        $obj->eventTemplateID = $eventTemplateID;

        return $obj;
    }

    public function withEventTemplateID(string $eventTemplateID): self
    {
        $obj = clone $this;
        $obj->eventTemplateID = $eventTemplateID;

        return $obj;
    }
}
