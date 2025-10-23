<?php

declare(strict_types=1);

namespace HubspotSDK\Events;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type visible_external_event_type_names = array{
 *   eventTypes: list<string>
 * }
 */
final class VisibleExternalEventTypeNames implements BaseModel, ResponseConverter
{
    /** @use SdkModel<visible_external_event_type_names> */
    use SdkModel;

    use SdkResponse;

    /**
     * List of event type names.
     *
     * @var list<string> $eventTypes
     */
    #[Api(list: 'string')]
    public array $eventTypes;

    /**
     * `new VisibleExternalEventTypeNames()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VisibleExternalEventTypeNames::with(eventTypes: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VisibleExternalEventTypeNames)->withEventTypes(...)
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
     *
     * @param list<string> $eventTypes
     */
    public static function with(array $eventTypes): self
    {
        $obj = new self;

        $obj->eventTypes = $eventTypes;

        return $obj;
    }

    /**
     * List of event type names.
     *
     * @param list<string> $eventTypes
     */
    public function withEventTypes(array $eventTypes): self
    {
        $obj = clone $this;
        $obj->eventTypes = $eventTypes;

        return $obj;
    }
}
