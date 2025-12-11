<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Automation;

use HubspotSDK\Automation\Workflows\APIContactFlow;
use HubspotSDK\Automation\Workflows\APIFlowBatchFetchFlowIDCoordinate\Type;
use HubspotSDK\Automation\Workflows\APIFlowEmailCampaign;
use HubspotSDK\Automation\Workflows\APIFlowListing;
use HubspotSDK\Automation\Workflows\APIPlatformFlow;
use HubspotSDK\Automation\Workflows\BatchResponseAPIFlow;
use HubspotSDK\Automation\Workflows\BatchResponseFlowIDWorkflowIDMappingResponse;
use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Automation\WorkflowsContract;

final class WorkflowsService implements WorkflowsContract
{
    /**
     * @api
     */
    public WorkflowsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new WorkflowsRawService($client);
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function create(
        ?RequestOptions $requestOptions = null
    ): APIContactFlow|APIPlatformFlow {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(requestOptions: $requestOptions);

        return $response->parse();
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
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($flowID, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): Page {
        $params = Util::removeNulls(['after' => $after, 'limit' => $limit]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
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
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($flowID, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): BatchResponseAPIFlow {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->batchGet(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): BatchResponseFlowIDWorkflowIDMappingResponse {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->batchGetIDMappings(params: $params, requestOptions: $requestOptions);

        return $response->parse();
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
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($flowID, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): Page {
        $params = Util::removeNulls(
            [
                'after' => $after,
                'before' => $before,
                'flowID' => $flowID,
                'limit' => $limit,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listEmailCampaigns(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
