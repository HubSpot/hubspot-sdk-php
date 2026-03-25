<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Marketing\Campaigns\PublicCampaign;
use HubspotSDK\Marketing\Campaigns\PublicCampaignWithAssets;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\CampaignsContract;
use HubspotSDK\Services\Marketing\Campaigns\AssetsService;
use HubspotSDK\Services\Marketing\Campaigns\BatchService;
use HubspotSDK\Services\Marketing\Campaigns\BudgetService;
use HubspotSDK\Services\Marketing\Campaigns\MetricsService;
use HubspotSDK\Services\Marketing\Campaigns\SpendService;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
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
     * Perform a partial update of a campaign identified by the specified ID. Provided property values will be overwritten. Read-only and non-existent properties will be ignored. Properties values can be cleared by passing an empty string. Note: The 'hs_goal' property is deprecated and will be ignored if provided.
     *
     * @param string $campaignGuid the unique identifier of the campaign to update
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
     * Delete a specified campaign from the system. This operation removes the campaign identified by the provided campaignGuid from your HubSpot account.
     *
     * @param string $campaignGuid the unique identifier of the campaign to delete
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
     * Read a campaign identified by a specified internal ID. This endpoint allows you to retrieve detailed information about a specific marketing campaign using its unique identifier. It supports filtering the response by specific properties and date ranges.
     *
     * @param string $campaignGuid the unique identifier of the campaign to retrieve
     * @param string $endDate the end date for filtering campaign data, in YYYY-MM-DD format
     * @param list<string> $properties a comma-separated list of property names to include in the response
     * @param string $startDate the start date for filtering campaign data, in YYYY-MM-DD format
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
