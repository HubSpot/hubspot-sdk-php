<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Automation;

use HubspotSDK\Automation\Workflows\APIContactFlow;
use HubspotSDK\Automation\Workflows\APIFlowBatchFetchFlowIDCoordinate\Type;
use HubspotSDK\Automation\Workflows\APIFlowEmailCampaign;
use HubspotSDK\Automation\Workflows\APIFlowListing;
use HubspotSDK\Automation\Workflows\APIPlatformFlow;
use HubspotSDK\Automation\Workflows\BatchResponseAPIFlow;
use HubspotSDK\Automation\Workflows\BatchResponseFlowIDWorkflowIDMappingResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface WorkflowsContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function create(
        ?RequestOptions $requestOptions = null
    ): APIContactFlow|APIPlatformFlow;

    /**
     * @api
     *
     * @throws APIException
     */
    public function update(
        string $flowID,
        ?RequestOptions $requestOptions = null
    ): APIContactFlow|APIPlatformFlow;

    /**
     * @api
     *
     * @return Page<APIFlowListing>
     *
     * @throws APIException
     */
    public function list(
        ?string $after = null,
        int $limit = 100,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        int $flowID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param list<array{flowID: string, type: 'FLOW_ID'|Type}> $inputs
     *
     * @throws APIException
     */
    public function batchGet(
        array $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseAPIFlow;

    /**
     * @api
     *
     * @param list<array<string,mixed>> $inputs
     *
     * @throws APIException
     */
    public function batchGetIDMappings(
        array $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseFlowIDWorkflowIDMappingResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function get(
        string $flowID,
        ?RequestOptions $requestOptions = null
    ): APIContactFlow|APIPlatformFlow;

    /**
     * @api
     *
     * @param list<string> $flowID
     *
     * @return Page<APIFlowEmailCampaign>
     *
     * @throws APIException
     */
    public function listEmailCampaigns(
        ?string $after = null,
        ?string $before = null,
        ?array $flowID = null,
        ?int $limit = null,
        ?RequestOptions $requestOptions = null,
    ): Page;
}
