<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Campaigns\CampaignCreateParams;
use HubspotSDK\Marketing\Campaigns\CampaignGetParams;
use HubspotSDK\Marketing\Campaigns\CampaignListParams;
use HubspotSDK\Marketing\Campaigns\CampaignUpdateParams;
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

use const HubspotSDK\Core\OMIT as omit;

final class CampaignsService implements CampaignsContract
{
    /**
     * @@api
     */
    public AssetsService $assets;

    /**
     * @@api
     */
    public BatchService $batch;

    /**
     * @@api
     */
    public BudgetService $budget;

    /**
     * @@api
     */
    public ReportsService $reports;

    /**
     * @@api
     */
    public SpendService $spend;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
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
     * @param array<string, string> $properties
     *
     * @throws APIException
     */
    public function create(
        $properties,
        ?RequestOptions $requestOptions = null
    ): PublicCampaign {
        $params = ['properties' => $properties];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicCampaign {
        [$parsed, $options] = CampaignCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'marketing/v3/campaigns/',
            body: (object) $parsed,
            options: $options,
            convert: PublicCampaign::class,
        );
    }

    /**
     * @api
     *
     * Perform a partial update of a campaign identified by the specified campaignGuid. Provided property values will be overwritten. Read-only and non-existent properties will cause 400 error.
     * If an empty string is passed for any property in the Batch Update, it will reset that property's value.
     *
     * @param array<string, string> $properties
     *
     * @throws APIException
     */
    public function update(
        string $campaignGuid,
        $properties,
        ?RequestOptions $requestOptions = null
    ): PublicCampaign {
        $params = ['properties' => $properties];

        return $this->updateRaw($campaignGuid, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $campaignGuid,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicCampaign {
        [$parsed, $options] = CampaignUpdateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['marketing/v3/campaigns/%1$s', $campaignGuid],
            body: (object) $parsed,
            options: $options,
            convert: PublicCampaign::class,
        );
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
        $after = omit,
        $limit = omit,
        $name = omit,
        $properties = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): Page {
        $params = [
            'after' => $after,
            'limit' => $limit,
            'name' => $name,
            'properties' => $properties,
            'sort' => $sort,
        ];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return Page<PublicCampaign>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): Page {
        [$parsed, $options] = CampaignListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'marketing/v3/campaigns/',
            query: $parsed,
            options: $options,
            convert: PublicCampaign::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Delete a specified campaign from the system.
     * This call will return a 204 No Content response regardless of whether the campaignGuid provided corresponds to an existing campaign or not.
     *
     * @throws APIException
     */
    public function delete(
        string $campaignGuid,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['marketing/v3/campaigns/%1$s', $campaignGuid],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Get a campaign identified by a specific campaignGuid with the given properties. Along with the campaign information, it also returns information about assets. Depending on the query parameters used, this can also be used to return information about the corresponding assets' metrics. Metrics are available only if startDate and endDate are provided.
     *
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
        $endDate = omit,
        $properties = omit,
        $startDate = omit,
        ?RequestOptions $requestOptions = null,
    ): PublicCampaignWithAssets {
        $params = [
            'endDate' => $endDate,
            'properties' => $properties,
            'startDate' => $startDate,
        ];

        return $this->getRaw($campaignGuid, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getRaw(
        string $campaignGuid,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicCampaignWithAssets {
        [$parsed, $options] = CampaignGetParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['marketing/v3/campaigns/%1$s', $campaignGuid],
            query: $parsed,
            options: $options,
            convert: PublicCampaignWithAssets::class,
        );
    }
}
