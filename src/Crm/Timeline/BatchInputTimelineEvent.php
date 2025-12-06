<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Timeline;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Used to create timeline events in batches.
 *
 * @phpstan-type BatchInputTimelineEventShape = array{inputs: list<TimelineEvent>}
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
    #[Api(list: TimelineEvent::class)]
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
     * @param list<TimelineEvent|array{
     *   eventTemplateId: string,
     *   tokens: array<string,string>,
     *   id?: string|null,
     *   domain?: string|null,
     *   email?: string|null,
     *   extraData?: mixed,
     *   objectId?: string|null,
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
     *   eventTemplateId: string,
     *   tokens: array<string,string>,
     *   id?: string|null,
     *   domain?: string|null,
     *   email?: string|null,
     *   extraData?: mixed,
     *   objectId?: string|null,
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
