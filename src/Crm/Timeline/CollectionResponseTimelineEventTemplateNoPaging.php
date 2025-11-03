<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Timeline;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type CollectionResponseTimelineEventTemplateNoPagingShape = array{
 *   results: list<TimelineEventTemplate>
 * }
 */
final class CollectionResponseTimelineEventTemplateNoPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponseTimelineEventTemplateNoPagingShape> */
    use SdkModel;

    /** @var list<TimelineEventTemplate> $results */
    #[Api(list: TimelineEventTemplate::class)]
    public array $results;

    /**
     * `new CollectionResponseTimelineEventTemplateNoPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseTimelineEventTemplateNoPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseTimelineEventTemplateNoPaging)->withResults(...)
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
     * @param list<TimelineEventTemplate> $results
     */
    public static function with(array $results): self
    {
        $obj = new self;

        $obj->results = $results;

        return $obj;
    }

    /**
     * @param list<TimelineEventTemplate> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }
}
