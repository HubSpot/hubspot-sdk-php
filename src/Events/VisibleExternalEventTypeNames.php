<?php

declare(strict_types=1);

namespace HubspotSDK\Events;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type VisibleExternalEventTypeNamesShape = array{
 *   eventTypes: list<string>
 * }
 */
final class VisibleExternalEventTypeNames implements BaseModel
{
    /** @use SdkModel<VisibleExternalEventTypeNamesShape> */
    use SdkModel;

    /**
     * List of event type names.
     *
     * @var list<string> $eventTypes
     */
    #[Required(list: 'string')]
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
        $self = new self;

        $self['eventTypes'] = $eventTypes;

        return $self;
    }

    /**
     * List of event type names.
     *
     * @param list<string> $eventTypes
     */
    public function withEventTypes(array $eventTypes): self
    {
        $self = clone $this;
        $self['eventTypes'] = $eventTypes;

        return $self;
    }
}
