<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Timeline\Events;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve details for a specific event, specified by template ID and event ID.
 *
 * @see HubspotSDK\Services\Crm\Timeline\EventsService::getDetail()
 *
 * @phpstan-type EventGetDetailParamsShape = array{eventTemplateId: string}
 */
final class EventGetDetailParams implements BaseModel
{
    /** @use SdkModel<EventGetDetailParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $eventTemplateId;

    /**
     * `new EventGetDetailParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EventGetDetailParams::with(eventTemplateId: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EventGetDetailParams)->withEventTemplateID(...)
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
    public static function with(string $eventTemplateId): self
    {
        $obj = new self;

        $obj['eventTemplateId'] = $eventTemplateId;

        return $obj;
    }

    public function withEventTemplateID(string $eventTemplateID): self
    {
        $obj = clone $this;
        $obj['eventTemplateId'] = $eventTemplateID;

        return $obj;
    }
}
