<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Automation;

use HubspotSDK\Automation\Workflows\APIContactFlow;
use HubspotSDK\Automation\Workflows\APIFlow;
use HubspotSDK\Automation\Workflows\APIFlowBatchFetchFlowIDCoordinate;
use HubspotSDK\Automation\Workflows\APIFlowBatchFetchMigrationFlowIDCoordinate;
use HubspotSDK\Automation\Workflows\APIFlowBatchFetchMigrationWorkflowIDCoordinate;
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
     * @param string $after
     * @param string $before
     * @param list<string> $flowID
     * @param int $limit
     *
     * @return Page<APIFlowEmailCampaign>
     *
     * @throws APIException
     */
    public function listEmailCampaigns(
        $after = omit,
        $before = omit,
        $flowID = omit,
        $limit = omit,
        ?RequestOptions $requestOptions = null,
    ): Page {
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
     * @return Page<APIFlowEmailCampaign>
     *
     * @throws APIException
     */
    public function listEmailCampaignsRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): Page {
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
            convert: APIFlowEmailCampaign::class,
            page: Page::class,
        );
    }
}
