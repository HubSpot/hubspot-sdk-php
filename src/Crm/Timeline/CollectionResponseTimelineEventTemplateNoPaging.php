<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Timeline;

use HubspotSDK\Core\Attributes\Required;
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
    #[Required(list: TimelineEventTemplate::class)]
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
     * @param list<TimelineEventTemplate|array{
     *   id: string,
     *   name: string,
     *   objectType: string,
     *   tokens: list<TimelineEventTemplateToken>,
     *   createdAt?: \DateTimeInterface|null,
     *   detailTemplate?: string|null,
     *   headerTemplate?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * }> $results
     */
    public static function with(array $results): self
    {
        $self = new self;

        $self['results'] = $results;

        return $self;
    }

    /**
     * @param list<TimelineEventTemplate|array{
     *   id: string,
     *   name: string,
     *   objectType: string,
     *   tokens: list<TimelineEventTemplateToken>,
     *   createdAt?: \DateTimeInterface|null,
     *   detailTemplate?: string|null,
     *   headerTemplate?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * }> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }
}
