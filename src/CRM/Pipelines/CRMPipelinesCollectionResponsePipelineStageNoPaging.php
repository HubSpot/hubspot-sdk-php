<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Pipelines;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type crm_pipelines_collection_response_pipeline_stage_no_paging = array{
 *   results: list<CRMPipelinesPipelineStage>
 * }
 */
final class CRMPipelinesCollectionResponsePipelineStageNoPaging implements BaseModel
{
    /** @use SdkModel<crm_pipelines_collection_response_pipeline_stage_no_paging> */
    use SdkModel;

    /** @var list<CRMPipelinesPipelineStage> $results */
    #[Api(list: CRMPipelinesPipelineStage::class)]
    public array $results;

    /**
     * `new CRMPipelinesCollectionResponsePipelineStageNoPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CRMPipelinesCollectionResponsePipelineStageNoPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CRMPipelinesCollectionResponsePipelineStageNoPaging)->withResults(...)
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
     * @param list<CRMPipelinesPipelineStage> $results
     */
    public static function with(array $results): self
    {
        $obj = new self;

        $obj->results = $results;

        return $obj;
    }

    /**
     * @param list<CRMPipelinesPipelineStage> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }
}
