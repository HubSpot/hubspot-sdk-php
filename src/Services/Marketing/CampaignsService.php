<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Marketing;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Marketing\Campaigns\PublicCampaign;
use HubSpotSDK\Marketing\Campaigns\PublicCampaignWithAssets;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Marketing\CampaignsContract;
use HubSpotSDK\Services\Marketing\Campaigns\AssetsService;
use HubSpotSDK\Services\Marketing\Campaigns\BatchService;
use HubSpotSDK\Services\Marketing\Campaigns\BudgetService;
use HubSpotSDK\Services\Marketing\Campaigns\MetricsService;
use HubSpotSDK\Services\Marketing\Campaigns\SpendService;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
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
    public MetricsService $metrics;

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
        $this->metrics = new MetricsService($client);
        $this->spend = new SpendService($client);
    }

    /**
     * @api
     *
     * Create a campaign with the specified properties and receive a copy of the campaign object, including its ID. Note that the 'hs_goal' property is deprecated and will be ignored if provided.
     *
     * @param array<string,string> $properties A collection of key-value pairs representing the properties of the campaign. Each key is a property name, and the corresponding value is the property's value.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        array $properties,
        RequestOptions|array|null $requestOptions = null
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
     * @param string $campaignGuid The UUID of the campaign, required
     * Example: 9dbec438-53e2-4b28-8c0f-38f56574a6e8
     * @param array<string,string> $properties A collection of key-value pairs representing the properties of the campaign. Each key is a property name, and the corresponding value is the property's value.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $campaignGuid,
        array $properties,
        RequestOptions|array|null $requestOptions = null,
    ): PublicCampaign {
        $params = Util::removeNulls(['properties' => $properties]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($campaignGuid, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a paginated list of campaigns from your HubSpot account. This endpoint allows you to specify sorting, pagination, and filtering options to tailor the results to your needs.
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param int $limit the maximum number of results to display per page
     * @param string $name Filter campaigns by name. Optional.
     * @param list<string> $properties A comma-separated list of properties to include in the response.
     *   Unrecognized properties are ignored. Optional. Example:
     *   hs_name, hs_budget,hs_notes
     * @param string $sort The property to sort results by. Optional.
     * @param RequestOpts|null $requestOptions
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
        RequestOptions|array|null $requestOptions = null,
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
     * @param string $campaignGuid The UUID of the campaign, required
     * Example: 9dbec438-53e2-4b28-8c0f-38f56574a6e8
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $campaignGuid,
        RequestOptions|array|null $requestOptions = null
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
     * @param string $campaignGuid The UUID of the campaign, required
     * Example: 9dbec438-53e2-4b28-8c0f-38f56574a6e8
     * @param string $endDate The end date for fetching asset metrics, in YYYY-MM-DD format.
     * Optional. Example: 2000-01-27
     * @param list<string> $properties A comma-separated list of properties to include in the response.
     *   Unrecognized properties are ignored. Optional. Example: hs_name,hs_budget, hs_notes
     * @param string $startDate The start date for fetching asset metrics, in YYYY-MM-DD format.
     * Optional. Example: 2000-01-20
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $campaignGuid,
        ?string $endDate = null,
        ?array $properties = null,
        ?string $startDate = null,
        RequestOptions|array|null $requestOptions = null,
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
