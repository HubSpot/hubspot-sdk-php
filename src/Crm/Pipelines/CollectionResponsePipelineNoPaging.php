<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Pipelines;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type CollectionResponsePipelineNoPagingShape = array{
 *   results: list<Pipeline>
 * }
 */
final class CollectionResponsePipelineNoPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponsePipelineNoPagingShape> */
    use SdkModel;

    /** @var list<Pipeline> $results */
    #[Required(list: Pipeline::class)]
    public array $results;

    /**
     * `new CollectionResponsePipelineNoPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponsePipelineNoPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponsePipelineNoPaging)->withResults(...)
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
     * @param list<Pipeline|array{
     *   id: string,
     *   archived: bool,
     *   createdAt: \DateTimeInterface,
     *   displayOrder: int,
     *   label: string,
     *   stages: list<PipelineStage>,
     *   updatedAt: \DateTimeInterface,
     *   archivedAt?: \DateTimeInterface|null,
     * }> $results
     */
    public static function with(array $results): self
    {
        $self = new self;

        $self['results'] = $results;

        return $self;
    }

    /**
     * @param list<Pipeline|array{
     *   id: string,
     *   archived: bool,
     *   createdAt: \DateTimeInterface,
     *   displayOrder: int,
     *   label: string,
     *   stages: list<PipelineStage>,
     *   updatedAt: \DateTimeInterface,
     *   archivedAt?: \DateTimeInterface|null,
     * }> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }
}
