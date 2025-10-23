<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Automation;

use HubspotSDK\Automation\Workflows\APIContactFlow;
use HubspotSDK\Automation\Workflows\APIFlow;
use HubspotSDK\Automation\Workflows\APIFlowBatchFetchFlowIDCoordinate;
use HubspotSDK\Automation\Workflows\APIFlowBatchFetchMigrationFlowIDCoordinate;
use HubspotSDK\Automation\Workflows\APIFlowBatchFetchMigrationWorkflowIDCoordinate;
use HubspotSDK\Automation\Workflows\APIFlowListing;
use HubspotSDK\Automation\Workflows\APIPlatformFlow;
use HubspotSDK\Automation\Workflows\BatchResponseAPIFlow;
use HubspotSDK\Automation\Workflows\BatchResponseFlowIDWorkflowIDMappingResponse;
use HubspotSDK\Automation\Workflows\CollectionResponseAPIFlowEmailCampaign;
use HubspotSDK\Automation\Workflows\WorkflowBatchGetIDMappingsParams;
use HubspotSDK\Automation\Workflows\WorkflowBatchGetParams;
use HubspotSDK\Automation\Workflows\WorkflowListEmailCampaignsParams;
use HubspotSDK\Automation\Workflows\WorkflowListParams;
use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Automation\WorkflowsContract;

use const HubspotSDK\Core\OMIT as omit;

final class WorkflowsService implements WorkflowsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new workflow.
     *
     * @throws APIException
     */
    public function create(
        ?RequestOptions $requestOptions = null
    ): APIContactFlow|APIPlatformFlow {
        // @phpstan-ignore-next-line;
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
     * Update a workflow by ID.
     *
     * @throws APIException
     */
    public function update(
        string $flowID,
        ?RequestOptions $requestOptions = null
    ): APIContactFlow|APIPlatformFlow {
        // @phpstan-ignore-next-line;
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
     * Retrieve all workflows from an account.
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param int $limit the maximum number of results to display per page
     *
     * @return Page<APIFlowListing>
     *
     * @throws APIException
     */
    public function list(
        $after = omit,
        $limit = omit,
        ?RequestOptions $requestOptions = null
    ): Page {
        $params = ['after' => $after, 'limit' => $limit];

        return $this->listRaw($params, $requestOptions);
    }

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
    ): Page {
        [$parsed, $options] = WorkflowListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * Fully delete a workflow by ID. Deleted workflows cannot be restored via the API. If you need to restore an accidentally deleted flow, you'll need to contact support.
     *
     * @throws APIException
     */
    public function delete(
        int $flowID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
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
     * Retrieve a batch of workflows by ID.
     *
     * @param list<APIFlowBatchFetchFlowIDCoordinate> $inputs
     *
     * @throws APIException
     */
    public function batchGet(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseAPIFlow {
        $params = ['inputs' => $inputs];

        return $this->batchGetRaw($params, $requestOptions);
    }

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
    ): BatchResponseAPIFlow {
        [$parsed, $options] = WorkflowBatchGetParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * Retrieve the IDs of v3 workflows that have been migrated to the v4 API.
     *
     * @param list<APIFlowBatchFetchMigrationFlowIDCoordinate|APIFlowBatchFetchMigrationWorkflowIDCoordinate> $inputs
     *
     * @throws APIException
     */
    public function batchGetIDMappings(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseFlowIDWorkflowIDMappingResponse {
        $params = ['inputs' => $inputs];

        return $this->batchGetIDMappingsRaw($params, $requestOptions);
    }

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
    ): BatchResponseFlowIDWorkflowIDMappingResponse {
        [$parsed, $options] = WorkflowBatchGetIDMappingsParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * Retrieve all details for a specific workflow by ID.
     *
     * @throws APIException
     */
    public function get(
        string $flowID,
        ?RequestOptions $requestOptions = null
    ): APIContactFlow|APIPlatformFlow {
        // @phpstan-ignore-next-line;
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
     * Retrieve emails sent by a workflow by ID.
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param string $before
     * @param list<string> $flowID the ID of the workflow
     * @param int $limit the maximum number of results to display per page
     *
     * @throws APIException
     */
    public function listEmailCampaigns(
        $after = omit,
        $before = omit,
        $flowID = omit,
        $limit = omit,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseAPIFlowEmailCampaign {
        $params = [
            'after' => $after,
            'before' => $before,
            'flowID' => $flowID,
            'limit' => $limit,
        ];

        return $this->listEmailCampaignsRaw($params, $requestOptions);
    }

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
    ): CollectionResponseAPIFlowEmailCampaign {
        [$parsed, $options] = WorkflowListEmailCampaignsParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'automation/v4/flows/email-campaigns',
            query: $parsed,
            options: $options,
            convert: CollectionResponseAPIFlowEmailCampaign::class,
        );
    }
}
