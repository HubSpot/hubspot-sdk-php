<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Pipelines;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PipelineStageShape from \HubSpotSDK\Crm\Pipelines\PipelineStage
 *
 * @phpstan-type CollectionResponsePipelineStageNoPagingShape = array{
 *   results: list<PipelineStage|PipelineStageShape>
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
     * @param list<PipelineStage|PipelineStageShape> $results
     */
    public static function with(array $results): self
    {
        $self = new self;

        $self['results'] = $results;

        return $self;
    }

    /**
     * @param list<PipelineStage|PipelineStageShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }
}
