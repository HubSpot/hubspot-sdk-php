<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Timeline;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Used to create timeline events in batches.
 *
 * @phpstan-import-type TimelineEventShape from \HubspotSDK\Crm\Timeline\TimelineEvent
 *
 * @phpstan-type BatchInputTimelineEventShape = array{
 *   inputs: list<TimelineEvent|TimelineEventShape>
 * }
 */
final class BatchInputTimelineEvent implements BaseModel
{
    /** @use SdkModel<BatchInputTimelineEventShape> */
    use SdkModel;

    /**
     * A collection of timeline events we want to create.
     *
     * @var list<TimelineEvent> $inputs
     */
    #[Required(list: TimelineEvent::class)]
    public array $inputs;

    /**
     * `new BatchInputTimelineEvent()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchInputTimelineEvent::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchInputTimelineEvent)->withInputs(...)
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
     * @param list<TimelineEvent|TimelineEventShape> $inputs
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
     * @param list<TimelineEvent|TimelineEventShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
