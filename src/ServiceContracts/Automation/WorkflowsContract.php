<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Automation;

use HubspotSDK\Automation\Workflows\APIContactFlow;
use HubspotSDK\Automation\Workflows\APIFlowBatchFetchFlowIDCoordinate;
use HubspotSDK\Automation\Workflows\APIFlowEmailCampaign;
use HubspotSDK\Automation\Workflows\APIFlowListing;
use HubspotSDK\Automation\Workflows\APIPlatformFlow;
use HubspotSDK\Automation\Workflows\BatchResponseAPIFlow;
use HubspotSDK\Automation\Workflows\BatchResponseFlowIDWorkflowIDMappingResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type APIFlowBatchFetchFlowIDCoordinateShape from \HubspotSDK\Automation\Workflows\APIFlowBatchFetchFlowIDCoordinate
 * @phpstan-import-type InputShape from \HubspotSDK\Automation\Workflows\WorkflowBatchGetIDMappingsParams\Input
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface WorkflowsContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        RequestOptions|array|null $requestOptions = null
    ): APIContactFlow|APIPlatformFlow;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $flowID,
        RequestOptions|array|null $requestOptions = null
    ): APIContactFlow|APIPlatformFlow;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<APIFlowListing>
     *
     * @throws APIException
     */
    public function list(
        ?string $after = null,
        int $limit = 100,
        RequestOptions|array|null $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        int $flowID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param list<APIFlowBatchFetchFlowIDCoordinate|APIFlowBatchFetchFlowIDCoordinateShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function batchGet(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): BatchResponseAPIFlow;

    /**
     * @api
     *
     * @param list<InputShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function batchGetIDMappings(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): BatchResponseFlowIDWorkflowIDMappingResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $flowID,
        RequestOptions|array|null $requestOptions = null
    ): APIContactFlow|APIPlatformFlow;

    /**
     * @api
     *
     * @param list<string> $flowID
     * @param RequestOpts|null $requestOptions
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
        RequestOptions|array|null $requestOptions = null,
    ): Page;
}
