<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Delete an existing property from a custom event definition.
 *
 * @see HubspotSDK\Services\Events\EventDefinitionsService::deleteProperty()
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

    #[Required]
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
        $self = new self;

        $self['eventName'] = $eventName;

        return $self;
    }

    public function withEventName(string $eventName): self
    {
        $self = clone $this;
        $self['eventName'] = $eventName;

        return $self;
    }
}
