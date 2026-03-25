<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Campaigns;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Marketing\Campaigns\ContactReference;
use HubspotSDK\Marketing\Campaigns\MetricsCounters;
use HubspotSDK\Marketing\Campaigns\RevenueAttributionAggregate;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\Campaigns\MetricsContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class MetricsService implements MetricsContract
{
    /**
     * @api
     */
    public MetricsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MetricsRawService($client);
    }

    /**
     * @api
     *
     * Fetch the metrics for a specific marketing campaign using its unique identifier. This endpoint allows you to retrieve various performance metrics of the campaign, which can be useful for analyzing the effectiveness of your marketing efforts over a specified time period.
     *
     * @param string $campaignGuid the unique identifier of the campaign for which metrics are being fetched
     * @param string $endDate the end date for fetching metrics, in YYYY-MM-DD format
     * @param string $startDate the start date for fetching metrics, in YYYY-MM-DD format
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getAttributionMetrics(
        string $campaignGuid,
        ?string $endDate = null,
        ?string $startDate = null,
        RequestOptions|array|null $requestOptions = null,
    ): MetricsCounters {
        $params = Util::removeNulls(
            ['endDate' => $endDate, 'startDate' => $startDate]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getAttributionMetrics($campaignGuid, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Fetch revenue attribution report data for a specific campaign. This endpoint allows you to retrieve detailed revenue attribution information, which can be filtered by attribution model and date range. It is useful for analyzing the financial impact of marketing campaigns.
     *
     * @param string $campaignGuid the unique identifier of the campaign
     * @param string $attributionModel the model used to attribute revenue to the campaign
     * @param string $endDate end date to fetch attribution data, YYYY-MM-DD
     * @param string $startDate start date to fetch attribution data, YYYY-MM-DD
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getRevenueAttribution(
        string $campaignGuid,
        ?string $attributionModel = null,
        ?string $endDate = null,
        ?string $startDate = null,
        RequestOptions|array|null $requestOptions = null,
    ): RevenueAttributionAggregate {
        $params = Util::removeNulls(
            [
                'attributionModel' => $attributionModel,
                'endDate' => $endDate,
                'startDate' => $startDate,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getRevenueAttribution($campaignGuid, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Fetch the list of contact IDs for the specified campaign and contact type. This endpoint allows you to retrieve contact identifiers associated with a particular campaign, filtered by the type of contact. It is useful for analyzing or processing contacts involved in specific marketing campaigns.
     *
     * @param string $contactType path param: The type of contact to filter the list
     * @param string $campaignGuid path param: The unique identifier of the campaign
     * @param string $after query param: The paging cursor token of the last successfully read resource, used for pagination
     * @param string $endDate query param: The end date for filtering contacts, formatted as a string
     * @param int $limit query param: The maximum number of results to display per page
     * @param string $startDate query param: The start date for filtering contacts, formatted as a string
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<ContactReference>
     *
     * @throws APIException
     */
    public function listContactIDsByType(
        string $contactType,
        string $campaignGuid,
        ?string $after = null,
        ?string $endDate = null,
        ?int $limit = null,
        ?string $startDate = null,
        RequestOptions|array|null $requestOptions = null,
    ): Page {
        $params = Util::removeNulls(
            [
                'campaignGuid' => $campaignGuid,
                'after' => $after,
                'endDate' => $endDate,
                'limit' => $limit,
                'startDate' => $startDate,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listContactIDsByType($contactType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
