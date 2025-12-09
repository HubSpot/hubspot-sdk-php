<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Automation;

use HubspotSDK\Automation\Workflows\APIContactFlow;
use HubspotSDK\Automation\Workflows\APIFlow;
use HubspotSDK\Automation\Workflows\APIFlowBatchFetchFlowIDCoordinate\Type;
use HubspotSDK\Automation\Workflows\APIFlowEmailCampaign;
use HubspotSDK\Automation\Workflows\APIFlowListing;
use HubspotSDK\Automation\Workflows\APIPlatformFlow;
use HubspotSDK\Automation\Workflows\BatchResponseAPIFlow;
use HubspotSDK\Automation\Workflows\BatchResponseFlowIDWorkflowIDMappingResponse;
use HubspotSDK\Automation\Workflows\WorkflowBatchGetIDMappingsParams;
use HubspotSDK\Automation\Workflows\WorkflowBatchGetParams;
use HubspotSDK\Automation\Workflows\WorkflowListEmailCampaignsParams;
use HubspotSDK\Automation\Workflows\WorkflowListParams;
use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Automation\WorkflowsRawContract;

final class WorkflowsRawService implements WorkflowsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * @return BaseResponse<APIContactFlow|APIPlatformFlow>
     *
     * @throws APIException
     */
    public function create(?RequestOptions $requestOptions = null): BaseResponse
    {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'automation/v4/flows',
            options: $requestOptions,
            convert: APIFlow::class,
        );
    }

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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['automation/v4/flows/%1$s', $flowID],
            options: $requestOptions,
            convert: APIFlow::class,
        );
    }

    /**
     * @api
     *
     * @param array{after?: string, limit?: int}|WorkflowListParams $params
     *
     * @return BaseResponse<Page<APIFlowListing>>
     *
     * @throws APIException
     */
    public function list(
        array|WorkflowListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = WorkflowListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'automation/v4/flows',
            query: $parsed,
            options: $options,
            convert: APIFlowListing::class,
            page: Page::class,
        );
    }

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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['automation/v4/flows/%1$s', $flowID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   inputs: list<array{flowID: string, type: 'FLOW_ID'|Type}>
     * }|WorkflowBatchGetParams $params
     *
     * @return BaseResponse<BatchResponseAPIFlow>
     *
     * @throws APIException
     */
    public function batchGet(
        array|WorkflowBatchGetParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = WorkflowBatchGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'automation/v4/flows/batch/read',
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseAPIFlow::class,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   inputs: list<array<string,mixed>>
     * }|WorkflowBatchGetIDMappingsParams $params
     *
     * @return BaseResponse<BatchResponseFlowIDWorkflowIDMappingResponse>
     *
     * @throws APIException
     */
    public function batchGetIDMappings(
        array|WorkflowBatchGetIDMappingsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WorkflowBatchGetIDMappingsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'automation/v4/workflow-id-mappings/batch/read',
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseFlowIDWorkflowIDMappingResponse::class,
        );
    }

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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['automation/v4/flows/%1$s', $flowID],
            options: $requestOptions,
            convert: APIFlow::class,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   after?: string, before?: string, flowID?: list<string>, limit?: int
     * }|WorkflowListEmailCampaignsParams $params
     *
     * @return BaseResponse<Page<APIFlowEmailCampaign>>
     *
     * @throws APIException
     */
    public function listEmailCampaigns(
        array|WorkflowListEmailCampaignsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WorkflowListEmailCampaignsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'automation/v4/flows/email-campaigns',
            query: Util::array_transform_keys($parsed, ['flowID' => 'flowId']),
            options: $options,
            convert: APIFlowEmailCampaign::class,
            page: Page::class,
        );
    }
}
