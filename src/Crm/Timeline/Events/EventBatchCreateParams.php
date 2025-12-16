<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Timeline\Events;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Timeline\TimelineEvent;

/**
 * Batch create multiple instances of timeline events based on an event template. Once created, these event are immutable on the object timeline and cannot be modified. If the event template was configured to update object properties via `objectPropertyName`, this call will also attempt to updates those properties, or add them if they don't exist.
 *
 * @see HubspotSDK\Services\Crm\Timeline\EventsService::batchCreate()
 *
 * @phpstan-import-type TimelineEventShape from \HubspotSDK\Crm\Timeline\TimelineEvent
 *
 * @phpstan-type EventBatchCreateParamsShape = array{
 *   inputs: list<TimelineEventShape>
 * }
 */
final class EventBatchCreateParams implements BaseModel
{
    /** @use SdkModel<EventBatchCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A collection of timeline events we want to create.
     *
     * @var list<TimelineEvent> $inputs
     */
    #[Required(list: TimelineEvent::class)]
    public array $inputs;

    /**
     * `new EventBatchCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EventBatchCreateParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EventBatchCreateParams)->withInputs(...)
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
     * @param list<TimelineEventShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * A collection of timeline events we want to create.
     *
     * @param list<TimelineEventShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
