<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Delete an existing property from a custom event definition.
 *
 * @see HubspotSDK\Events\EventDefinitions->deleteProperty
 *
 * @phpstan-type EventDefinitionDeletePropertyParamsShape = array{
 *   eventName: string
 * }
 */
final class EventDefinitionDeletePropertyParams implements BaseModel
{
    /** @use SdkModel<EventDefinitionDeletePropertyParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $eventName;

    /**
     * `new EventDefinitionDeletePropertyParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EventDefinitionDeletePropertyParams::with(eventName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EventDefinitionDeletePropertyParams)->withEventName(...)
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
    public static function with(string $eventName): self
    {
        $obj = new self;

        $obj->eventName = $eventName;

        return $obj;
    }

    public function withEventName(string $eventName): self
    {
        $obj = clone $this;
        $obj->eventName = $eventName;

        return $obj;
    }
}
