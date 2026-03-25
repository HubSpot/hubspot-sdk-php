<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Campaigns;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Campaigns\ContactReference;
use HubspotSDK\Marketing\Campaigns\MetricsCounters;
use HubspotSDK\Marketing\Campaigns\RevenueAttributionAggregate;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface MetricsContract
{
    /**
     * @api
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
    ): MetricsCounters;

    /**
     * @api
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
    ): RevenueAttributionAggregate;

    /**
     * @api
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
    ): Page;
}
