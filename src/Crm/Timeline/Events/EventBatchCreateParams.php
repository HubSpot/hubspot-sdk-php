<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Timeline\Events;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Timeline\TimelineEvent;
use HubspotSDK\Crm\Timeline\TimelineEventIFrame;

/**
 * Batch create multiple instances of timeline events based on an event template. Once created, these event are immutable on the object timeline and cannot be modified. If the event template was configured to update object properties via `objectPropertyName`, this call will also attempt to updates those properties, or add them if they don't exist.
 *
 * @see HubspotSDK\Services\Crm\Timeline\EventsService::batchCreate()
 *
 * @phpstan-type EventBatchCreateParamsShape = array{
 *   inputs: list<TimelineEvent|array{
 *     eventTemplateID: string,
 *     tokens: array<string,string>,
 *     id?: string|null,
 *     domain?: string|null,
 *     email?: string|null,
 *     extraData?: mixed,
 *     objectID?: string|null,
 *     timelineIFrame?: TimelineEventIFrame|null,
 *     timestamp?: \DateTimeInterface|null,
 *     utk?: string|null,
 *   }>,
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
     * @param list<TimelineEvent|array{
     *   eventTemplateID: string,
     *   tokens: array<string,string>,
     *   id?: string|null,
     *   domain?: string|null,
     *   email?: string|null,
     *   extraData?: mixed,
     *   objectID?: string|null,
     *   timelineIFrame?: TimelineEventIFrame|null,
     *   timestamp?: \DateTimeInterface|null,
     *   utk?: string|null,
     * }> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj['inputs'] = $inputs;

        return $obj;
    }

    /**
     * A collection of timeline events we want to create.
     *
     * @param list<TimelineEvent|array{
     *   eventTemplateID: string,
     *   tokens: array<string,string>,
     *   id?: string|null,
     *   domain?: string|null,
     *   email?: string|null,
     *   extraData?: mixed,
     *   objectID?: string|null,
     *   timelineIFrame?: TimelineEventIFrame|null,
     *   timestamp?: \DateTimeInterface|null,
     *   utk?: string|null,
     * }> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj['inputs'] = $inputs;

        return $obj;
    }
}
