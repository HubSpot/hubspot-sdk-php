<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Pipelines;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PipelineStageShape from \HubspotSDK\Crm\Pipelines\PipelineStage
 *
 * @phpstan-type CollectionResponsePipelineStageNoPagingShape = array{
 *   results: list<PipelineStageShape>
 * }
 */
final class CollectionResponsePipelineStageNoPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponsePipelineStageNoPagingShape> */
    use SdkModel;

    /** @var list<PipelineStage> $results */
    #[Required(list: PipelineStage::class)]
    public array $results;

    /**
     * `new CollectionResponsePipelineStageNoPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponsePipelineStageNoPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponsePipelineStageNoPaging)->withResults(...)
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
     * @param list<PipelineStageShape> $results
     */
    public static function with(array $results): self
    {
        $self = new self;

        $self['results'] = $results;

        return $self;
    }

    /**
     * @param list<PipelineStageShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }
}
