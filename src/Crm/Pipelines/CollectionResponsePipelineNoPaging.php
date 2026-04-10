<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Pipelines;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PipelineShape from \HubSpotSDK\Crm\Pipelines\Pipeline
 *
 * @phpstan-type CollectionResponsePipelineNoPagingShape = array{
 *   results: list<Pipeline|PipelineShape>
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
     * @param list<Pipeline|PipelineShape> $results
     */
    public static function with(array $results): self
    {
        $self = new self;

        $self['results'] = $results;

        return $self;
    }

    /**
     * @param list<Pipeline|PipelineShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }
}
