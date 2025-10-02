<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Pipelines;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type crm_pipelines_collection_response_pipeline_no_paging = array{
 *   results: list<CRMPipelinesPipeline>
 * }
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class CRMPipelinesCollectionResponsePipelineNoPaging implements BaseModel
{
    /** @use SdkModel<crm_pipelines_collection_response_pipeline_no_paging> */
    use SdkModel;

    /** @var list<CRMPipelinesPipeline> $results */
    #[Api(list: CRMPipelinesPipeline::class)]
    public array $results;

    /**
     * `new CRMPipelinesCollectionResponsePipelineNoPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CRMPipelinesCollectionResponsePipelineNoPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CRMPipelinesCollectionResponsePipelineNoPaging)->withResults(...)
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
     * @param list<CRMPipelinesPipeline> $results
     */
    public static function with(array $results): self
    {
        $obj = new self;

        $obj->results = $results;

        return $obj;
    }

    /**
     * @param list<CRMPipelinesPipeline> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }
}
