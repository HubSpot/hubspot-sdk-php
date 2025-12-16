<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Automation;

use HubspotSDK\Automation\Workflows\APIContactFlow;
use HubspotSDK\Automation\Workflows\APIFlowEmailCampaign;
use HubspotSDK\Automation\Workflows\APIFlowListing;
use HubspotSDK\Automation\Workflows\APIPlatformFlow;
use HubspotSDK\Automation\Workflows\BatchResponseAPIFlow;
use HubspotSDK\Automation\Workflows\BatchResponseFlowIDWorkflowIDMappingResponse;
use HubspotSDK\Automation\Workflows\WorkflowBatchGetIDMappingsParams;
use HubspotSDK\Automation\Workflows\WorkflowBatchGetParams;
use HubspotSDK\Automation\Workflows\WorkflowListEmailCampaignsParams;
use HubspotSDK\Automation\Workflows\WorkflowListParams;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface WorkflowsRawContract
{
    /**
     * @api
     *
     * @return BaseResponse<APIContactFlow|APIPlatformFlow>
     *
     * @throws APIException
     */
    public function create(
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<APIContactFlow|APIPlatformFlow>
     *
     * @throws APIException
     */
    public function update(
        string $flowID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|WorkflowListParams $params
     *
     * @return BaseResponse<Page<APIFlowListing>>
     *
     * @throws APIException
     */
    public function list(
        array|WorkflowListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        int $flowID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|WorkflowBatchGetParams $params
     *
     * @return BaseResponse<BatchResponseAPIFlow>
     *
     * @throws APIException
     */
    public function batchGet(
        array|WorkflowBatchGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|WorkflowBatchGetIDMappingsParams $params
     *
     * @return BaseResponse<BatchResponseFlowIDWorkflowIDMappingResponse>
     *
     * @throws APIException
     */
    public function batchGetIDMappings(
        array|WorkflowBatchGetIDMappingsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<APIContactFlow|APIPlatformFlow>
     *
     * @throws APIException
     */
    public function get(
        string $flowID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|WorkflowListEmailCampaignsParams $params
     *
     * @return BaseResponse<Page<APIFlowEmailCampaign>>
     *
     * @throws APIException
     */
    public function listEmailCampaigns(
        array|WorkflowListEmailCampaignsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
