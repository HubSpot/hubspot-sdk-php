<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Automation;

use HubspotSDK\Automation\Workflows\APIContactFlow;
use HubspotSDK\Automation\Workflows\APIFlowBatchFetchFlowIDCoordinate;
use HubspotSDK\Automation\Workflows\APIFlowBatchFetchMigrationFlowIDCoordinate;
use HubspotSDK\Automation\Workflows\APIFlowBatchFetchMigrationWorkflowIDCoordinate;
use HubspotSDK\Automation\Workflows\APIFlowListing;
use HubspotSDK\Automation\Workflows\APIPlatformFlow;
use HubspotSDK\Automation\Workflows\BatchResponseAPIFlow;
use HubspotSDK\Automation\Workflows\BatchResponseFlowIDWorkflowIDMappingResponse;
use HubspotSDK\Automation\Workflows\CollectionResponseAPIFlowEmailCampaign;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

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
     * @param string $after
     * @param int $limit
     *
     * @return Page<APIFlowListing>
     *
     * @throws APIException
     */
    public function list(
        $after = omit,
        $limit = omit,
        ?RequestOptions $requestOptions = null
    ): Page;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return Page<APIFlowListing>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
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
     * @param list<APIFlowBatchFetchFlowIDCoordinate> $inputs
     *
     * @throws APIException
     */
    public function batchGet(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseAPIFlow;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function batchGetRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseAPIFlow;

    /**
     * @api
     *
     * @param list<APIFlowBatchFetchMigrationFlowIDCoordinate|APIFlowBatchFetchMigrationWorkflowIDCoordinate> $inputs
     *
     * @throws APIException
     */
    public function batchGetIDMappings(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseFlowIDWorkflowIDMappingResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function batchGetIDMappingsRaw(
        array $params,
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
     * @param string $after
     * @param string $before
     * @param list<string> $flowID
     * @param int $limit
     *
     * @throws APIException
     */
    public function listEmailCampaigns(
        $after = omit,
        $before = omit,
        $flowID = omit,
        $limit = omit,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseAPIFlowEmailCampaign;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listEmailCampaignsRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseAPIFlowEmailCampaign;
}
