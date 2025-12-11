<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Marketing\Campaigns\PublicCampaign;
use HubspotSDK\Marketing\Campaigns\PublicCampaignWithAssets;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\CampaignsContract;
use HubspotSDK\Services\Marketing\Campaigns\AssetsService;
use HubspotSDK\Services\Marketing\Campaigns\BatchService;
use HubspotSDK\Services\Marketing\Campaigns\BudgetService;
use HubspotSDK\Services\Marketing\Campaigns\ReportsService;
use HubspotSDK\Services\Marketing\Campaigns\SpendService;

final class CampaignsService implements CampaignsContract
{
    /**
     * @api
     */
    public CampaignsRawService $raw;

    /**
     * @api
     */
    public AssetsService $assets;

    /**
     * @api
     */
    public BatchService $batch;

    /**
     * @api
     */
    public BudgetService $budget;

    /**
     * @api
     */
    public ReportsService $reports;

    /**
     * @api
     */
    public SpendService $spend;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CampaignsRawService($client);
        $this->assets = new AssetsService($client);
        $this->batch = new BatchService($client);
        $this->budget = new BudgetService($client);
        $this->reports = new ReportsService($client);
        $this->spend = new SpendService($client);
    }

    /**
     * @api
     *
     * Create a campaign with the given properties and return the campaign object, including the campaignGuid and created properties.
     *
     * @param array<string,string> $properties
     *
     * @throws APIException
     */
    public function create(
        array $properties,
        ?RequestOptions $requestOptions = null
    ): PublicCampaign {
        $params = Util::removeNulls(['properties' => $properties]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Perform a partial update of a campaign identified by the specified campaignGuid. Provided property values will be overwritten. Read-only and non-existent properties will cause 400 error.
     * If an empty string is passed for any property in the Batch Update, it will reset that property's value.
     *
     * @param string $campaignGuid unique identifier for the campaign, formatted as a UUID
     * @param array<string,string> $properties
     *
     * @throws APIException
     */
    public function update(
        string $campaignGuid,
        array $properties,
        ?RequestOptions $requestOptions = null,
    ): PublicCampaign {
        $params = Util::removeNulls(['properties' => $properties]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($campaignGuid, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * This endpoint allows users to search for and return a page of campaigns based on various query parameters. Users can filter by name, sort, and paginate through the campaigns, as well as control which properties are returned in the response.
     *
     * @param string $after A cursor for pagination. If provided, the results will start after the given cursor.
     * Example: NTI1Cg%3D%3D
     * @param int $limit The maximum number of results to return. Allowed values range from 1 to 100
     * Default: 50
     * @param string $name A filter to return campaigns whose names contain the specified substring. This allows partial matching of campaign names, returning all campaigns that include the given substring in their name. If this parameter is not provided, the search will return all campaigns
     * @param list<string> $properties A comma-separated list of the properties to be returned in the response. If any of the specified properties has empty value on the requested object(s), they will be ignored and not returned in response. If this parameter is empty, the response will include an empty properties map
     * @param string $sort The field by which to sort the results. Allowed values are hs_name, createdAt, updatedAt. An optional '-' before the property name can denote descending order
     * Default: hs_name
     *
     * @return Page<PublicCampaign>
     *
     * @throws APIException
     */
    public function list(
        ?string $after = null,
        ?int $limit = null,
        ?string $name = null,
        ?array $properties = null,
        ?string $sort = null,
        ?RequestOptions $requestOptions = null,
    ): Page {
        $params = Util::removeNulls(
            [
                'after' => $after,
                'limit' => $limit,
                'name' => $name,
                'properties' => $properties,
                'sort' => $sort,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a specified campaign from the system.
     * This call will return a 204 No Content response regardless of whether the campaignGuid provided corresponds to an existing campaign or not.
     *
     * @param string $campaignGuid unique identifier for the campaign, formatted as a UUID
     *
     * @throws APIException
     */
    public function delete(
        string $campaignGuid,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($campaignGuid, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a campaign identified by a specific campaignGuid with the given properties. Along with the campaign information, it also returns information about assets. Depending on the query parameters used, this can also be used to return information about the corresponding assets' metrics. Metrics are available only if startDate and endDate are provided.
     *
     * @param string $campaignGuid unique identifier for the campaign, formatted as a UUID
     * @param string $endDate  End date to fetch asset metrics, formatted as YYYY-MM-DD. This date is used to fetch the metrics associated with the assets for a specified period.
     * If not provided, no asset metrics will be fetched.
     * @param list<string> $properties A comma-separated list of the properties to be returned in the response. If any of the specified properties has empty value on the requested object, they will be ignored and not returned in response. If this parameter is empty, the response will include an empty properties map.
     * @param string $startDate Start date to fetch asset metrics, formatted as YYYY-MM-DD. This date is used to fetch the metrics associated with the assets for a specified period.
     * If not provided, no asset metrics will be fetched.
     *
     * @throws APIException
     */
    public function get(
        string $campaignGuid,
        ?string $endDate = null,
        ?array $properties = null,
        ?string $startDate = null,
        ?RequestOptions $requestOptions = null,
    ): PublicCampaignWithAssets {
        $params = Util::removeNulls(
            [
                'endDate' => $endDate,
                'properties' => $properties,
                'startDate' => $startDate,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($campaignGuid, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
